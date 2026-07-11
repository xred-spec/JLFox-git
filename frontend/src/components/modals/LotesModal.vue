<script setup lang="ts">
import type { Input } from '@/interfaces/FormInput';
import { reactive, ref, watch } from 'vue';


const props = defineProps<{
    header: string
    inputs: Input[]
    show: boolean
    modelValue?: Record<string, any> | null
    prendas: {label: string, value: any}[]
}>()

const emits = defineEmits([
    'close',
    'accept'
])

const prendas = ref<{prenda_id: number | string, cantidad: number }[]>([
    {prenda_id: '', cantidad: 1}
])

const agregarPrenda = () => {
    prendas.value.push({prenda_id: '', cantidad: 1})
}

const eliminarPrenda = (index: number) => {
    if (prendas.value.length === 1) {
        prendas.value[0] = {prenda_id: '', cantidad: 1}
    }

    prendas.value.slice(index, 1)
}

const formData = reactive<Record<string, any>>({});

if(props.modelValue) {
    for(const p in props.modelValue ) {
        formData[p] = props.modelValue[p]
    } 
} else {
    for (const i of props.inputs) {
        formData[i.modelKey] = ''
    }
}
const formErrors = reactive<Record<string, boolean>>({});

const cleanInputs = () => {
    Object.keys(formData).forEach(key => delete formData[key])
    Object.keys(formErrors).forEach(key => delete formErrors[key])
    prendas.value = [{prenda_id: '', cantidad: 1}]
}

const validateInputs = () => {
    let valid = true
    Object.keys(formErrors).forEach(key => delete formErrors[key])

    for(const i of props.inputs) {
        if(i.required && i.modelKey != '') {
            const value = formData[i.modelKey]

            if(value === undefined || value === null || value === '') {
                formErrors[i.modelKey] = true
                valid = false
            }
        }
    }

    const validPrendas = prendas.value.every(p => p.prenda_id !== '' && p.cantidad > 0)
    if(!validPrendas){
        valid = false
    }

    if(valid) {
        const sendData = {...
            formData,
            prendas: prendas.value
        }
        console.log('data: ', sendData)
        cleanInputs()
        emits('accept', sendData)
    }
} 


</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="cleanInputs(), emits('close')">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[90vw] max-h-[80vh] bg-[#ffffff] rounded-[15px] p-5">
            <h1 class="text-xl w-full text-center font-bold text-[#000000] pb-2 border-[#63492a] border-b-2">
                {{header}}
            </h1>

            <div class="grid grid-cols-2">
                <div class="px-2">
                    <div v-for="i in inputs" class="flex flex-col justify-center py-2 border-[#63492a]">
                        <div class="flex items-center justify-between px-2">
                            <label v-if="i.type != 'checkboxes'" class="text-[#000000] font-bold text-lg mb-1">
                                {{ i.label }} <span v-if="i.required" class="text-[#c41a1a]">*</span>
                            </label>

                            <label v-if="formErrors[i.modelKey] && i.type != 'checkboxes'" class="text-[#c41a1a] font-bold text-lg mb-1">
                                Campo faltante
                            </label>
                        </div>

                        <template v-if="i.type === 'select'">
                            <select v-model="formData[i.modelKey]"
                            :required="i.required"
                            class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a]">
                                <option value="" disabled>Seleccione un estado</option>
                                <option v-for="o in i.options" :key="o.value" :value="o.value">
                                    {{ o.label }}
                                </option>
                            </select>
                        </template>

                        <template v-else-if="i.type === 'textarea'">
                            <textarea v-model="formData[i.modelKey]" 
                            :required="i.required" :placeholder="i.placeholder" :rows=3
                            class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] placeholder:text-[#000000]/50"
                            >
                            </textarea>
                        </template>

                        <template v-else-if="i.type === 'checkboxes'">
                            <div class="flex items-center justify-between">
                                <div v-for="item in i.checkboxItems" class="flex items-center px-2">
                                    <label class="text-[#000000] font-bold text-lg">
                                        {{ item.label }} <span v-if="item.required" class="text-[#c41a1a]">*</span>
                                    </label>

                                    <input type="checkbox" v-model="formData[item.modelKey]" class="border border-[#63492a]">
                                </div>
                            </div>
                        </template>

                        <template v-else>
                            <input v-model="formData[i.modelKey]"
                            :type="i.type" :placeholder="i.placeholder" :required="i.required"
                            :min="i.min" :max="i.max" :maxlength="i.max"
                            class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] placeholder:text-[#000000]/50"
                            >
                        </template>
                    </div>
                </div>

                <div class="p-2">
                    <div class="flex items-center justify-between border-[#63492a] border-b pb-1">
                        <label class="text-[#000000] font-bold text-lg">
                            Prenda(s)
                        </label>

                        <button class="font-bold flex items-center py-1 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] hover:scale-102"
                        @click="agregarPrenda()">
                            Agregar
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" 
                            class="lucide lucide-plus-icon lucide-plus size-5 ml-1"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                        </button>
                    </div>
                    
                    <div class="overflow-y-auto max-h-[50vh]">
                        <div v-for="(item, index) in prendas" :key="index"
                        class="flex-col items-center text-sm bg-[#e4e4e4] my-1.5 py-2 px-5 rounded-[15px]">
                            <select v-model="item.prenda_id"
                            class="w-full text-sm bg-[#FFFFFF] py-1 px-2 rounded-[5px] font-bold text-[#000000] border border-[#63492a]">
                                <option value="" disabled selected>Seleccione una prenda</option>
                                <option v-for="p in props.prendas" :key="p.value" :value="p.value"> 
                                    {{ p.label }}
                                </option>
                            </select>
                            <div class="flex items-center justify-between mt-1">
                                <div class="flex items-center">
                                    <label class="text-[#000000] font-bold text-sm mr-1">
                                        Cantidad:
                                    </label>

                                    <input 
                                    type="number" value="1" min="1" v-model="item.cantidad"
                                    class="w-fit bg-[#FFFFFF] py-1 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] placeholder:text-[#000000]/50"
                                    >
                                </div>
                                
                                <button class="flex py-1 px-5 ml-1 justify-center items-center rounded-[5px] bg-[#c41a1a] text-[#ffffff] text-sm font-bold cursor-pointer"
                                @click="eliminarPrenda(index)">
                                    Eliminar
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                    class="lucide lucide-trash2-icon lucide-trash-2 size-3 ml-1"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    

            <div class="mt flex items-center justify-between pt-2 border-[#63492a] border-t-2">
                <button class="w-full mr-1 rounded-[5px] font-bold text-lg text-[#ffffff] py-3 bg-[#c41a1a] cursor-pointer hover:scale-102"
                @click="cleanInputs(), emits('close')">
                    Cerrar
                </button>

                <button class="w-full ml-1 rounded-[5px] font-bold text-lg text-[#ffffff] py-3 bg-[#3bb937] cursor-pointer hover:scale-102"
                @click="validateInputs()">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</template>


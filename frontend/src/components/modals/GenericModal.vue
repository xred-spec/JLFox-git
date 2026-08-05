1<script setup lang="ts">
import type { Input } from '@/interfaces/FormInput';
import { reactive, watch } from 'vue';

const props = defineProps<{
    header: string
    inputs: Input[]
    show: boolean
    modelValue?: Record<string, any> | null
}>()

const emits = defineEmits([
    'close',
    'accept'
])

const formData = reactive<Record<string, any>>({});
const formErrors = reactive<Record<string, boolean>>({});

watch(() => props.modelValue, (newValue) => {
    Object.keys(formData).forEach(key => delete formData[key])
    Object.keys(formErrors).forEach(key => delete formErrors[key])
    
    if (newValue) {
        for (const p in newValue) {
            formData[p] = newValue[p]
        }
    } else {
        for (const i of props.inputs) {
            if (i.modelKey) formData[i.modelKey] = ''
        }
    }
}, { immediate: true })


watch(() => formData['tipo_prenda_id'], (nuevoValor, valorAnterior) => {
    if (valorAnterior !== undefined && nuevoValor !== valorAnterior) {
        formData['pieza_prenda_id'] = ''; 
    }
});


const getOptions = (inputItem: Input) => {
    if (inputItem.modelKey === 'pieza_prenda_id') {
        const tipoSeleccionadoId = formData['tipo_prenda_id'];
    
        if (!tipoSeleccionadoId) return [];

        const inputTipos = props.inputs.find(i => i.modelKey === 'tipo_prenda_id');
        if (!inputTipos || !inputTipos.options) return [];

        const tipoSeleccionado = inputTipos.options.find((opt: any) => opt.value == tipoSeleccionadoId);
        
        if (tipoSeleccionado && (tipoSeleccionado as any).piezas) {
            return (tipoSeleccionado as any).piezas.map((pieza: any) => ({
                label: pieza.nombre,
                value: pieza.id
            }));
        }
        return [];
    }
    
    return inputItem.options || [];
}

const cleanInputs = () => {
    Object.keys(formData).forEach(key => delete formData[key])
    Object.keys(formErrors).forEach(key => delete formErrors[key])
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

    if(valid) {
        const sendData = {...formData}
        console.log('send: ', sendData)
        cleanInputs()
        emits('accept', sendData)
    }
} 

//console.log('model: ', props.modelValue)
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="cleanInputs(), emits('close')">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[40vw] bg-[#ffffff] rounded-[15px] p-5">
            <h1 class="text-xl w-full text-center font-bold text-[#000000] pb-2 border-[#63492a] border-b-2">
                {{header}}
            </h1>

            <div v-for="i in inputs" :key="i.modelKey" class="flex flex-col justify-center py-2 border-[#63492a]">
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
                        <option value="" disabled>Seleccione una opción</option>
                        <option v-for="o in getOptions(i)" :key="o.value" :value="o.value">
                            {{ o.label }}
                        </option>
                    </select>
                </template>

                <template v-else-if="i.type === 'textarea'">
                    <textarea v-model="formData[i.modelKey]" 
                    :required="i.required" :placeholder="i.placeholder" :rows="3"
                    class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] placeholder:text-[#000000]/50"
                    >
                    </textarea>
                </template>

                <template v-else-if="i.type === 'checkboxes'">
                    <div class="flex items-center justify-between">
                        <div v-for="item in i.checkboxItems" :key="item.modelKey" class="flex items-center px-2">
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
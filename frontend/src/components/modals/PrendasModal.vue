<script setup lang="ts">
import type { Input } from '@/interfaces/FormInput';
import { reactive, ref } from 'vue';

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

for (const i of props.inputs) {
    if (i.type === 'checkboxes' && i.checkboxItems) {
        for (const item of i.checkboxItems) {
            formData[item.modelKey] = false
        }
    }

    else if (i.modelKey) {
        formData[i.modelKey] = ''
    }
}

if(props.modelValue) {
    for(const p in props.modelValue ) {
        formData[p] = props.modelValue[p]
    }
}

const formErrors = reactive<Record<string, boolean>>({});

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

        if (sendData['tiene_forro'] === false) {
            sendData['forro_id'] = null; 
        }
        
        if (sendData['tiene_bordado'] === false) {
            sendData['bordado_id'] = null; 
        }
        //console.log('modelValue. ',props.modelValue)
        //console.log('form. ',formData)
        //console.log('send. ',sendData)
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
        class="flex flex-col justify-center w-full max-w-[70vw] bg-[#ffffff] rounded-[15px] p-5">
            <h1 class="text-xl w-full text-center font-bold text-[#000000] pb-2 border-[#63492a] border-b-2">
                {{header}}
            </h1>

            <div class="grid grid-cols-2 gap-x-2">
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
                        :disabled="(i.modelKey === 'forro_id' && !formData['tiene_forro']) || (i.modelKey === 'bordado_id' && !formData['tiene_bordado'])"
                        class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] disabled:cursor-not-allowed disabled:text-[#000000]/50">
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

                    <template v-else-if="i.type != 'checkboxes'">
                        <input v-model="formData[i.modelKey]"
                        :type="i.type" :placeholder="i.placeholder" :required="i.required"
                        :min="i.min" :max="i.max" :maxlength="i.max"
                        class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] placeholder:text-[#000000]/50"
                        >
                    </template>
                </div>
            </div>

            <div class="flex w-full pb-2">
                <template v-for="input in props.inputs">
                    <div  v-if="input.type === 'checkboxes'" class="flex w-full items-center justify-between">
                        <div v-for="item in input.checkboxItems" class="flex items-center px-2">
                            <label class="text-[#000000] font-bold text-lg">
                                {{ item.label }} <span v-if="item.required" class="text-[#c41a1a]">*</span>
                            </label>

                            <input type="checkbox" v-model="formData[item.modelKey]" class="border border-[#63492a] ml-2 p-1">
                        </div>
                    </div>
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


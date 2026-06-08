<script setup lang="ts">
import type { Input } from '@/interfaces/FormInput';
import { reactive } from 'vue';

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
        if(i.required) {
            const value = formData[i.modelKey]

            if(value === undefined || value === null || value === '') {
                formErrors[i.modelKey] = true
                valid = false
            }
        }
    }

    if(valid) {
        const sendData = {...formData}
        cleanInputs()
        emits('accept', sendData)
    }
} 
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="cleanInputs()">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[40vw] bg-[#ffffff] rounded-[15px] p-5">
            <h1 class="text-xl w-full text-center font-bold text-[#000000]">
                {{header}}
            </h1>

            <div v-for="i in inputs" class="flex flex-col justify-center py-2 my-2 border-y border-[#63492a]">
                <div class="flex items-center justify-between px-2">
                    <label class="text-[#000000] font-bold text-lg mb-1">
                        {{ i.label }} <span v-if="i.required" class="text-[#c41a1a]">*</span>
                    </label>

                    <label v-if="formErrors[i.modelKey]" class="text-[#c41a1a] font-bold text-lg mb-1">
                        Campo faltante
                    </label>
                </div>

                <template v-if="i.type === 'select'">
                    <select v-model="formData[i.modelKey]"
                    :required="i.required"
                    class="bg-[#FFFFFF] py-3 px-5 rounded-[10px] font-bold text-[#000000] border-b-2 border-[#63492a]">
                        <option v-for="o in i.options">
                            {{ o.label }}
                        </option>
                    </select>
                </template>

                <template v-else-if="i.type === 'textarea'">
                    <textarea v-model="formData[i.modelKey]" 
                    :required="i.required" :placeholder="i.placeholder" :rows=3
                    class="bg-[#FFFFFF] py-3 px-5 rounded-[10px] font-bold text-[#000000] border-b-2 border-[#63492a] placeholder:text-[#000000]/50"
                    >
                    </textarea>
                </template>

                <template v-else>
                    <input v-model="formData[i.modelKey]"
                    :type="i.type" :placeholder="i.placeholder" :required="i.required"
                    :min="i.min" :max="i.max" :maxlength="i.max"
                    class="bg-[#FFFFFF] py-3 px-5 rounded-[10px] font-bold text-[#000000] border-2 border-[#63492a] placeholder:text-[#000000]/50"
                    >
                </template>
            </div>

            <div class="mt-2 flex items-center justify-between">
                <button class="w-full mr-1 rounded-[15px] font-bold text-lg text-[#ffffff] py-3 bg-[#c41a1a] cursor-pointer hover:scale-102"
                @click="cleanInputs(), emits('close')">
                    Cerrar
                </button>

                <button class="w-full ml-1 rounded-[15px] font-bold text-lg text-[#ffffff] py-3 bg-[#2630bb] cursor-pointer hover:scale-102"
                @click="validateInputs()">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</template>


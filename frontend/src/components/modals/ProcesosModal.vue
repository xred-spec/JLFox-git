<script setup lang="ts">
import type { Input } from '@/interfaces/FormInput';
import { reactive, ref, watch, computed } from 'vue';

const emptyProcess = ref(false)
const statedLabels = ref<ProcesoLabel[]>([])
const formData = reactive<Record<string, any>>({});
const formErrors = reactive<Record<string, boolean>>({});

interface ProcesoLabel {
    id: number;
    nombre: string;
    [key: string]: any; 
}

const props = defineProps<{
    header: string
    inputs: Input[]
    labels: ProcesoLabel[]
    show: boolean
    modelValue?: Record<string, any> | null
}>()

if(props.modelValue) {
    for(const p in props.modelValue ) {
        formData[p] = props.modelValue[p]
    }
}

const assignatedLabels = computed(() => {
    return statedLabels.value
    .filter(label => label.state === 'assigned')
    .sort((a, b) => (a.orden || 0) - (b.orden || 0)) 
})

const unassignedLabels = computed(() => {
    return statedLabels.value.filter(label => label.state === 'unassigned')
})

const assignProcess = (label: ProcesoLabel) => {
    label.state = 'assigned'
    label.orden = 9999
    recalculateOrder()
}

const removeProcess = (label: ProcesoLabel) => {
    label.state = 'unassigned'
    label.orden = 0
    recalculateOrder()
}

const recalculateOrder = () => {
    const assigned = statedLabels.value
    .filter(l => l.state === 'assigned')
    .sort((a, b) => (a.orden || 0) - (b.orden || 0))

    assigned.forEach((label, index) => {
        label.orden = index + 1
    });
}

watch(() => props.modelValue, (newValue) => {
    Object.keys(formData).forEach(key => delete formData[key])
    Object.keys(formErrors).forEach(key => delete formErrors[key])
    emptyProcess.value = false

    if (newValue) {
        for (const p in newValue) {
            formData[p] = newValue[p]
        }

        if (newValue.id) {
            formData['prenda_id'] = String(newValue.id) 
        }

    } else {
        for (const i of props.inputs) {
            if (i.modelKey) formData[i.modelKey] = ''
        }
    }

    const procesoArray = Array.isArray(newValue?.procesos) ? 
        newValue?.procesos : []

    statedLabels.value = props.labels.map((label) => {
        const indexInModel = procesoArray.indexOf(label.id)
        const alreadyAssigned = newValue?.procesos?.includes(label.id)
        
        return {
            ...label,
            state: alreadyAssigned ? 'assigned' : 'unassigned',
            orden: alreadyAssigned ? indexInModel + 1 : 0
        }
    })
}, { immediate: true })
console.log(props.modelValue)

const emits = defineEmits([
    'close',
    'accept'
])

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

    const processAssigned = statedLabels.value.some(label => label.state === 'assigned')
    if (!processAssigned) {
        valid = false
        emptyProcess.value = true
    } else emptyProcess.value = false

    if(valid) {
        const sendData = {...formData}
        sendData.procesos = assignatedLabels.value.map(label => ({
            proceso_id: label.id,
            orden: label.orden
        }));

        //console.log('modelValue. ',props.modelValue)
        //console.log('form. ',formData)
        //console.log('send: ',sendData)
        cleanInputs()
        emits('accept', sendData)
    }
} 
//console.log('formData', formData)
console.log('stateds: ', statedLabels.value)
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="cleanInputs(), emits('close')">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[60vw] max-h-[60vh] bg-[#ffffff] rounded-[15px] p-5">
            <h1 class="text-xl w-full text-center font-bold text-[#000000] pb-2 border-[#63492a] border-b-2">
                {{header}}
            </h1>

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
                    :disabled="formData ? true : false"
                    class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]">
                        <option v-for="o in i.options" :key="o.value" :value="o.value || ''">
                            {{ o.label }}
                        </option>
                    </select>
                </template>
            </div>

            <div class="grid grid-cols-2 gap-x-2 pb-2">
                <div class="flex flex-col">
                    <div class="flex justify-between">
                        <label class="text-[#000000] font-bold text-lg mb-1">
                            Procesos asignados en orden
                        </label>

                        <label v-if="emptyProcess" class="text-[#c41a1a] font-bold text-base mb-1">
                            No puede quedar vacío
                        </label>
                    </div>    

                    <div class="flex flex-wrap bg-[#e4e4e4] rounded-[10px] size-full p-2 overflow-y-auto">
                        <template v-for="label in assignatedLabels" :key="label.id">
                            <button 
                            class="bg-[#bfbbf5] border border-[#584cff] rounded-[10px] py-2 px-5 m-1 cursor-pointer font-bold"
                            @click="label.state = 'unassigned', removeProcess(label)">
                                {{ label.orden }}. {{ label.nombre }}
                            </button>
                        </template>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="text-[#000000] font-bold text-lg mb-1">
                        Procesos sin asignar
                    </label>

                    <div class="flex flex-wrap bg-[#e4e4e4] rounded-[10px] size-full p-2 overflow-y-auto">
                        <template v-for="label in unassignedLabels" :key="label.id">
                            <button 
                            class="bg-[#f7bbbb] border border-[#c41a1a] rounded-[10px] py-2 px-5 m-1 cursor-pointer font-bold"
                            @click="label.state = 'assigned', assignProcess(label)">
                                {{ label.nombre }}
                            </button>
                        </template>
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
<script setup lang="ts">
import { ref, computed, watch } from 'vue';
import { useApi } from '@/composables/useApi';

const props = defineProps<{
    show: boolean
    modelValue: Record<string, any> | null
}>()
console.log('model: ', props.modelValue)

const emits = defineEmits([
    'close',
    'accept'
])

const selectedPrendaId = ref<number | string>('')
const cantidadProcesos = ref<number | string>('')

const validateInput = ref(false)

const selectedPrenda = computed(() => {
    const prendas = props.modelValue?.prendas

    if(prendas && Array.isArray(prendas) && selectedPrendaId.value !== '') {
        return prendas.find((p:any) => p.prenda.id === selectedPrendaId.value)
    }

    return null
})

const selectOptions = computed(() => {
    const prendas = props.modelValue?.prendas

    if(prendas && Array.isArray(prendas)) {
        const options = prendas.map((p: any) => ({
            label: `${p.prenda.tipo_prenda.nombre} ${p.prenda.color_tela.color}, 
            Talla: ${p.prenda.talla} - 
            Bordado: ${p.prenda.bordado?.forma || 'Sin bordado'} - 
            Forro: ${p.prenda.forro?.color || 'Sin forro'} - 
            Cartera: ${p.prenda.tiene_cartera ? 'Con cartera' : 'Sin cartera'}`,
            value: p.prenda.id
        }))

        //console.log('options: ', options)
        return options
    }

    return []  
})

const allFinish = computed(() => {
    const prendas = props.modelValue?.prendas

    if(!prendas || !Array.isArray(prendas) || prendas.length === 0) return false

    return prendas.every((p: any) => p.cantidad_final !== null && p.cantidad_final !== undefined)
})

const closeModal = () => {
    selectedPrendaId.value = ''
    validateInput.value = false
    emits('close')
}
//console.log('model: ', props.modelValue)

const forwardProcess = async (order: number) => {
        if (!selectedPrenda.value) return;
        validateInput.value = false

        if (cantidadProcesos.value === '' || cantidadProcesos.value === null) {
            validateInput.value = true;
            return;
        }

        if(cantidadProcesos.value !== '' && cantidadProcesos.value !== null) {
            const cantidad = Number(cantidadProcesos.value)

            if(cantidad <= 0 || cantidad > selectedPrenda.value.cantidad_prevista 
            ) {
                validateInput.value = true
                return
            }
        }

        const cantidadAEnviar = cantidadProcesos.value !== '' ? Number(cantidadProcesos.value) : null;

        const {data, error} = await useApi(`lotes/process/${selectedPrenda.value.id_prenda_lote}`).put({
            proceso_actual: order,
            cantidad_proceso: cantidadAEnviar
        }).json()

        if(data.value) {
            //console.log('data: ', data.value)
            selectedPrenda.value.proceso_actual = order
            selectedPrenda.value.cantidad_proceso = cantidadAEnviar;
            return
        }

    if(error.value) {
        console.log('error: ', error.value)
        return
    }
}

const backwardProcess = async (order: number) => {
    if (!selectedPrenda.value) return;

    const {data, error} = await useApi(`lotes/process/${selectedPrenda.value.id_prenda_lote}`).put({
            proceso_actual: order,
            cantidad_proceso: cantidadProcesos.value !== '' ? cantidadProcesos.value : null
        }).json()

        if(data.value) {
            //console.log('data: ', data.value)
            selectedPrenda.value.proceso_actual = order
            return
        }

    if(error.value) {
        console.log('error: ', error.value)
        return
    }
}

const closeProduction = async() => {
    if (!selectedPrenda.value) return;
    validateInput.value = false

    if(cantidadProcesos.value === '' || cantidadProcesos.value === null) {
        validateInput.value = true
        return
    }

    const cantidad = Number(cantidadProcesos.value)
    if(cantidad <= 0 || cantidad > selectedPrenda.value.cantidad_prevista) {
        validateInput.value = true
        return
    }

    const {data, error} = await useApi(`lotes/close-production/${selectedPrenda.value.id_prenda_lote}`).put({
            cantidad_final: cantidad
        }).json()

        if(data.value) {
            //console.log('data: ', data.value)
            selectedPrenda.value.cantidad_final = cantidad
            return
        }

    if(error.value) {
        console.log('error: ', error.value)
        return
    }
}

const finishLote = async() => {
    const {error} = useApi(`lotes/state/${props.modelValue?.id}`).put({
        estado: 'terminado'
    }).json()

    if(!error.value) {
        emits('accept')
        closeModal()
    } else {
        console.log('error: ', error.value)
    }
}

const findProcess = (index: number) => {
    if (!selectedPrenda.value) return '-';

    const process = selectedPrenda.value.prenda.procesos
    .find((item: any) => item.orden === index)

    //console.log('process: ', process)
    return process.proceso.nombre || '-'
}

watch((selectedPrenda), (newPrenda) => {
    console.log('selected: ', selectedPrenda.value)

    if(newPrenda) {
        cantidadProcesos.value = newPrenda.cantidad_proceso || ''
    } else {
        cantidadProcesos.value = ''
    }
})

watch(allFinish, (allFinished) => {
    if(allFinished) finishLote()
})
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="closeModal">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[75vw] bg-[#ffffff] rounded-[10px] p-5">
            <div class="flex flex-col px-2 items-center pb-2">
                <div class="flex items-center w-full mb-2 py-1">
                    <label class="text-[#000000] font-bold text-lg mb-1">
                        Prenda: 
                    </label> 

                    <select v-model="selectedPrendaId" class="bg-[#FFFFFF] w-full py-2 px-2 rounded-[5px] ml-2 font-bold text-[#000000] border border-[#63492a] disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]">
                        <option value="" disabled>Seleccione una opción</option>
                        <option v-for="op in selectOptions" :key="op.value" :value="op.value">
                            {{ op.label }}
                        </option>
                    </select>
                </div>

                <div class="grid grid-cols-3 w-full gap-x-2 mb-2">
                    <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                        Cantidad prevista: 
                        <span class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm">
                            {{ selectedPrenda?.cantidad_prevista || '-'}}
                        </span>
                    </label>

                    <div class="flex">
                        <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                            Cantidad proceso: 
                        </label>

                        <input type="number" v-model="cantidadProcesos" :disabled="!selectedPrenda || selectedPrenda?.cantidad_final"
                        class="flex-1 ml-2 py-1 px-2 rounded-[5px] font-bold text-[#000000] border placeholder:text-[#000000]/50 bg-[#FFFFFF]"
                        :class="validateInput ? 'border-[#c41a1a] border-2' : 'border-[#63492a]'" />
                    </div>

                    <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                        Cantidad final: 
                        <span class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm">
                            {{ selectedPrenda?.cantidad_final || '-'}}
                        </span>
                    </label>
                </div>

                <div class="grid grid-cols-3 w-full gap-x-2">
                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px] py-2">
                        <label class="text-[#000000] font-bold text-base">
                            Proceso anterior
                        </label>

                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-base text-[#c41a1a]">
                            <template v-if="!selectedPrenda || !selectedPrenda.prenda.procesos?.length || !selectedPrenda.proceso_actual || selectedPrenda.proceso_actual <= 1">
                                -
                            </template>

                            <template v-else-if="selectedPrenda.proceso_actual > 1">
                                {{ findProcess(selectedPrenda.proceso_actual - 1) }}
                            </template>
                        </label>
                    </div>

                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px] py-2">
                        <label class="text-[#000000] font-bold text-base">
                            Proceso actual
                        </label>

                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-base">
                            <template v-if="!selectedPrenda">
                                -
                            </template>

                            <template v-else-if="!selectedPrenda.prenda.procesos?.length">
                                No hay procesos asignados
                            </template>

                            <template v-else-if="!selectedPrenda.proceso_actual">
                                No se ha iniciado producción
                            </template>

                            <template v-else>
                                {{ findProcess(selectedPrenda.proceso_actual) }}
                            </template>
                        </label>
                    </div>

                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px] py-2">
                        <label class="text-[#000000] font-bold text-base">
                            Proceso siguiente
                        </label>

                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-base text-[#2630bb]">
                            <template v-if="!selectedPrenda || !selectedPrenda.prenda.procesos?.length || !selectedPrenda.proceso_actual || selectedPrenda.proceso_actual === selectedPrenda.prenda.procesos.length">
                                -
                            </template>

                            <template v-else>
                                {{ findProcess(selectedPrenda.proceso_actual + 1) }}
                            </template>
                        </label>
                    </div>
                </div>
            </div>            

            <div class="grid grid-cols-2 w-full gap-x-2 py-2">
                <button class="font-bold flex justify-center items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] enabled:hover:scale-102 disabled:bg-[#2630bb]/50"
                :disabled="!selectedPrenda?.prenda.procesos?.length || !selectedPrenda?.proceso_actual || selectedPrenda?.proceso_actual <= 1 || selectedPrenda?.cantidad_final"
                @click="backwardProcess(selectedPrenda?.proceso_actual - 1)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-move-left-icon lucide-move-left size-4 mr-1"><path d="M6 8L2 12L6 16"/><path d="M2 12H22"/></svg>
                    Retroceder al proceso anterior
                </button>

                <button class="font-bold flex justify-center items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] enabled:hover:scale-102 disabled:bg-[#2630bb]/50"
                :disabled="!selectedPrenda?.prenda.procesos?.length || selectedPrenda?.proceso_actual >= selectedPrenda?.prenda.procesos?.length || selectedPrenda?.cantidad_final"
                @click="forwardProcess((selectedPrenda?.proceso_actual || 0) + 1)"
                >
                    Avanzar al proceso siguiente
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-move-right-icon lucide-move-right size-4 ml-1"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                </button>
            </div>

            <div class="flex items-center w-full mb-2">
                <button class="w-full font-bold flex justify-center items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#3bb937] enabled:hover:scale-102 disabled:bg-[#3bb937]/50"
                :disabled="!selectedPrenda?.proceso_actual || !selectedPrenda?.prenda.procesos?.length || selectedPrenda.proceso_actual < selectedPrenda.prenda.procesos.length || selectedPrenda?.cantidad_final"
                @click="closeProduction()">
                    Terminar producción
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-circle-check-big-icon lucide-circle-check-big size-4 ml-1"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>
                </button>
            </div>

        <div class="mt flex items-center justify-between pt-2 border-[#63492a] border-t-2">
            <button class="w-full rounded-[5px] font-bold text-lg text-[#ffffff] py-2 bg-[#c41a1a] cursor-pointer hover:scale-101"
            @click="closeModal">
                Cerrar
            </button>
        </div>
        </div>
    </div>
</template>
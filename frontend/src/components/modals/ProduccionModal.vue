<script setup lang="ts">
import { ref, computed, watch } from 'vue';
import { useApi } from '@/composables/useApi';

const props = defineProps<{
    show: boolean
    modelValue: Record<string, any> | null
}>()

const emits = defineEmits([
    'close',
    'accept'
])

const selectedPrendaId = ref<number | string>('')
const selectedPiezaId = ref<number | string>('')
const cantidadProcesos = ref<number | string>('')

const tiempoHoras = ref<number | string>(0)
const tiempoHorasVal = ref(false)
const tiempoMin = ref<number | string>(0)
const tiempoMinVal = ref(false)
const tiempoSeg = ref<number | string>(0)
const tiempoSegVal = ref(false)

const validateInput = ref(false)

const selectedPrenda = computed(() => {
    const prendas = props.modelValue?.prendas

    if(prendas && Array.isArray(prendas) && selectedPrendaId.value !== '') {
        return prendas.find((p:any) => p.prenda.id === selectedPrendaId.value)
    }

    return null
})

const selectedPieza = computed(() => {
    const piezas = selectedPrenda.value?.prenda?.tipo_prenda.piezas

    if(piezas && Array.isArray(piezas) && selectedPiezaId.value !== '') {
        return piezas.find((p:any) => p.id === selectedPiezaId.value)
    }

    return null
})

const selectOptions = computed(() => {
    const prendas = props.modelValue?.prendas

    if(prendas && Array.isArray(prendas)) {
        return prendas.map((p: any) => ({
            label: `${p.prenda.tipo_prenda.nombre} ${p.prenda.color_tela.color}, 
            Talla: ${p.prenda.talla} - 
            Bordado: ${p.prenda.bordado?.forma || 'Sin bordado'} - 
            Forro: ${p.prenda.forro?.color || 'Sin forro'} - 
            Cartera: ${p.prenda.tiene_cartera ? 'Con cartera' : 'Sin cartera'}`,
            value: p.prenda.id
        }))
    }

    return []  
})

const trackingActual = computed(() => {
    if (!selectedPieza.value || !selectedPrenda.value) return null;

    return selectedPieza.value.prenda_lote.find(
        (tracking: any) => tracking.prenda_lote_id === selectedPrenda.value.id_prenda_lote
    );
});

const allPiezasFinished = computed(() => {
    const prendas = props.modelValue?.prendas;

    if(!prendas || !Array.isArray(prendas) || prendas.length === 0) return false;

    return prendas.every((p: any) => {
        const piezas = p.prenda?.tipo_prenda?.piezas;
        
        if (!piezas || !Array.isArray(piezas) || piezas.length === 0) return false;
        return piezas.every((pieza: any) => {
            const prendaLotes = pieza.prenda_lote;

            if (!prendaLotes || !Array.isArray(prendaLotes) || prendaLotes.length === 0) return false;

            return prendaLotes.every((pl: any) => 
                pl.cantidad_final_pieza !== null && 
                pl.cantidad_final_pieza !== undefined
            );
        });
    });
});

const allPrendasFinish = computed(() => {
    const prendas = props.modelValue?.prendas

    if(!prendas || !Array.isArray(prendas) || prendas.length === 0) return false

    return prendas.every((p: any) => p.cantidad_final_prenda !== null && p.cantidad_final_prenda !== undefined)
})

const closeModal = () => {
    selectedPrendaId.value = ''
    selectedPiezaId.value = ''
    validateInput.value = false
    emits('close')
}

const forwardProcess = async (order: number) => {
    if (!trackingActual.value) return;
    validateInput.value = false

    tiempoHorasVal.value = tiempoMinVal.value = tiempoSegVal.value = false

    if (cantidadProcesos.value === '' || cantidadProcesos.value === null) {
        validateInput.value = true;
        return;
    }

    if(cantidadProcesos.value !== '' && cantidadProcesos.value !== null) {
        const cantidad = Number(cantidadProcesos.value)

        if(cantidad <= 0 || cantidad > selectedPrenda.value.cantidad_prevista) {
            validateInput.value = true
            return
        }
    }

    if(tiempoHoras.value === null || tiempoHoras.value === '' || isNaN(Number(tiempoHoras.value))) {    
        tiempoHorasVal.value = true
        return
    }

    if(tiempoMin.value === null || tiempoMin.value === '' || isNaN(Number(tiempoMin.value))) {    
        tiempoMinVal.value = true
        return
    }

    if(tiempoSeg.value === null || tiempoSeg.value === '' || isNaN(Number(tiempoSeg.value))) {    
        tiempoSegVal.value = true
        return
    }

    const cantidadAEnviar = cantidadProcesos.value !== '' ? Number(cantidadProcesos.value) : null;

    const {data, error} = await useApi(`lotes/process/${trackingActual.value.id}`).put({
        proceso_actual: order,
        cantidad_proceso: cantidadAEnviar,
        tiempo_realizado_hora: tiempoHoras.value,
        tiempo_realizado_minuto: tiempoMin.value,
        tiempo_realizado_segundo: tiempoMin.value
    }).json()

    if(data.value) {
        trackingActual.value.proceso_actual = order
        trackingActual.value.cantidad_proceso = cantidadAEnviar;
        trackingActual.value.tiempo_realizado_hora = tiempoHoras.value
        trackingActual.value.tiempo_realizado_minuto = tiempoMin.value
        trackingActual.value.tiempo_realizado_segundo = tiempoSeg.value

        const trackingBackend = data.value.data || data.value;

        trackingActual.value.tiempo_final_hora = trackingBackend.tiempo_final_hora;
        trackingActual.value.tiempo_final_minuto = trackingBackend.tiempo_final_minuto;
        trackingActual.value.tiempo_final_segundo = trackingBackend.tiempo_final_segundo;
        return
    }

    if(error.value) console.log('error: ', error.value)
}

//aqui siguele
const backwardProcess = async (order: number) => {
    if (!trackingActual.value) return;

    const {data, error} = await useApi(`lotes/process/${trackingActual.value.id}`).put({
        proceso_actual: order,
        cantidad_proceso: cantidadProcesos.value !== '' ? cantidadProcesos.value : null,
        tiempo_realizado_hora: tiempoHoras.value,
        tiempo_realizado_minuto: tiempoMin.value,
        tiempo_realizado_segundo: tiempoMin.value
    }).json()

    if(data.value) {
        trackingActual.value.proceso_actual = order
        return
    }

    if(error.value) console.log('error: ', error.value)
}

const closeProductionPieza = async() => {
    if (!trackingActual.value) return;
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

    const {data, error} = await useApi(`lotes/close-piece/${trackingActual.value.prenda_lote_id}`).put({
        cantidad_final_pieza: cantidad
    }).json()

    if(data.value) {
        trackingActual.value.cantidad_final_pieza = cantidad
        return
    }

    if(error.value) console.log('error: ', error.value)
}

const closeProduction = async() => {
    if (!selectedPrenda.value) return;

    const piezas = selectedPrenda.value.prenda?.tipo_prenda?.piezas;
    if (!piezas || !Array.isArray(piezas) || piezas.length === 0) return;

    const cantidadesFinales = piezas.map((pieza: any) => {
        const tracking = pieza.prenda_lote?.find(
            (pl: any) => pl.prenda_lote_id === selectedPrenda.value.id_prenda_lote
        );
        return tracking?.cantidad_final_pieza;
    });

    if (cantidadesFinales.some((cantidad: any) => cantidad === null || cantidad === undefined)) {
        console.log("No se puede cerrar la prenda: Aún hay piezas sin terminar.");
        return;
    }

    const cantidadMinima = Math.min(...cantidadesFinales.map(Number));

    if(cantidadMinima <= 0 || cantidadMinima > selectedPrenda.value.cantidad_prevista) {
        console.log("Error: La cantidad mínima calculada es inválida respecto a la prevista.");
        return;
    }

    const {data, error} = await useApi(`lotes/close-production/${selectedPrenda.value.id_prenda_lote}`).put({
        cantidad_final_prenda: cantidadMinima
    }).json()

    if(data.value) {
        selectedPrenda.value.cantidad_final_prenda = cantidadMinima
        return
    }

    if(error.value) console.log('error: ', error.value)
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
    if (!selectedPieza.value) return '-';

    const process = selectedPieza.value.procesos.find((item: any) => item.orden === index)
    return process?.clave || '-'
}

const findTimes = (index: number, time: string) => {
    if (!selectedPieza.value) return '-';

    const process = selectedPieza.value.procesos.find((item: any) => item.orden === index)
    if(!process) return '00'

    let valor = 0

    if(time === 'hora') valor = process?.tiempo_previsto_hora 
    else if(time === 'minuto') valor = process?.tiempo_previsto_minuto 
    else if(time === 'segundo') valor = process?.tiempo_previsto_segundo

    return String(valor ?? 0).padStart(2, '0')
}

watch(trackingActual, (newTracking) => {
    if(newTracking) {
        cantidadProcesos.value = newTracking.cantidad_proceso || ''
        console.log('tracking: ', trackingActual.value)
        console.log('selectedPieza: ', selectedPieza.value)
    } else {
        cantidadProcesos.value = ''
    }
})

watch(allPiezasFinished, (allFinished) => {
    if(allFinished) {
        closeProduction()
    }
})

watch(allPrendasFinish, (allFinished) => {
    if(allFinished) {
        finishLote()
    }
})

console.log('prendaModel: ', props.modelValue)
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

                <div class="flex items-center w-full mb-2 py-1">
                    <label class="text-[#000000] font-bold text-lg mb-1">
                        Pieza: 
                    </label> 

                    <select v-model="selectedPiezaId" class="bg-[#FFFFFF] w-full py-2 px-2 rounded-[5px] ml-2 font-bold text-[#000000] border border-[#63492a] disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]">
                        <option value="" disabled>Seleccione una opción</option>
                        <option v-for="op in selectedPrenda?.prenda.tipo_prenda.piezas" :key="op.id" :value="op.id">
                            {{ op.nombre }}
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

                        <input type="number" v-model="cantidadProcesos" :disabled="!selectedPrenda || trackingActual?.cantidad_final_pieza || !selectedPieza"
                        class="flex-1 ml-2 py-1 px-2 rounded-[5px] font-bold text-[#000000] border placeholder:text-[#000000]/50 bg-[#FFFFFF] disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]"
                        :class="validateInput ? 'border-[#c41a1a] border-2' : 'border-[#63492a]'" />
                    </div>

                    <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                        Cantidad final: 
                        <span class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm">
                            {{ trackingActual?.cantidad_final_pieza || '-'}}
                        </span>
                    </label>
                </div>

                <div class="grid grid-cols-3 w-full gap-x-2">
                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px] py-2">
                        <label class="text-[#000000] font-bold text-base">
                            Proceso anterior
                        </label>

                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-base text-[#c41a1a]">
                            <template v-if="!selectedPieza || !selectedPieza?.procesos?.length || !trackingActual?.proceso_actual || trackingActual?.proceso_actual <= 1">
                                -
                            </template>

                            <template v-else>
                                {{ findProcess(trackingActual.proceso_actual - 1) }}
                            </template>
                        </label>
                    </div>

                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px] py-2">
                        <label class="text-[#000000] font-bold text-base">
                            Proceso actual
                        </label>

                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-base">
                            <template v-if="!selectedPieza">
                                -
                            </template>

                            <template v-else-if="!selectedPieza.procesos?.length">
                                No hay procesos asignados
                            </template>

                            <template v-else-if="!trackingActual?.proceso_actual">
                                No se ha iniciado producción
                            </template>

                            <template v-else>
                                {{ findProcess(trackingActual.proceso_actual) }}
                            </template>
                        </label>
                    </div>

                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px] py-2">
                        <label class="text-[#000000] font-bold text-base">
                            Proceso siguiente
                        </label>

                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-base text-[#2630bb]">
                            <template v-if="!selectedPieza || !selectedPieza.procesos?.length || !trackingActual?.proceso_actual || trackingActual.proceso_actual >= selectedPieza.procesos.length">
                                -
                            </template>

                            <template v-else>
                                {{ findProcess(trackingActual.proceso_actual + 1) }}
                            </template>
                        </label>
                    </div>
                </div>

                <div class="flex-col justify-center py-2">
                    <div class="flex w-full items-center justify-center">
                        <label class="text-[#000000] font-bold mt-2">
                            Tiempo previsto:
                        </label>
                    </div>
                    <div class="grid grid-cols-3 w-full items-center py-2 justify-center">
                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold mx-1 text-center">
                            <span class="text-[#c41a1a]">{{ findTimes(trackingActual?.proceso_actual, 'hora') }}</span> Hora(s)
                        </label>

                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold mx-1 text-center">
                            <span class="text-[#c41a1a]">{{ findTimes(trackingActual?.proceso_actual, 'minuto') }}</span> Minuto(s)
                        </label>

                        <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold mx-1 text-center">
                            <span class="text-[#c41a1a]">{{ findTimes(trackingActual?.proceso_actual, 'segundo') }}</span> Segundo(s)
                        </label>
                    </div>

                    <div class="flex w-full items-center justify-center">
                        <label class="text-[#000000] font-bold mt-2">
                            Tiempo realizado:
                        </label>
                    </div>
                    <div class="grid grid-cols-3 w-full items-center py-2 justify-center ">
                        <div class="flex flex-col items-center">
                            <input type="number" 
                            class="text-center flex-1 py-1 pl-4 px-2 rounded-[5px] font-bold text-[#000000] border placeholder:text-[#000000]/50 bg-[#FFFFFF] disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]"
                            min="0" max="59"  v-model="tiempoHoras"
                            :disabled="!selectedPrenda || trackingActual?.cantidad_final_pieza || !selectedPieza"
                            :class="tiempoHorasVal ? 'border-[#c41a1a] border-2' : 'border-[#63492a]'"
                            >
                            <label class="text-[#000000] font-bold">
                                Hora(s)
                            </label>
                        </div>

                        <div class="flex flex-col items-center">
                            <input type="number" 
                            class="text-center flex-1 py-1 pl-4 px-2 rounded-[5px] font-bold text-[#000000] border placeholder:text-[#000000]/50 bg-[#FFFFFF] disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]"
                            min="0" max="59" v-model="tiempoMin"
                            :disabled="!selectedPrenda || trackingActual?.cantidad_final_pieza || !selectedPieza"
                            :class="tiempoMinVal ? 'border-[#c41a1a] border-2' : 'border-[#63492a]'"
                            >
                            <label class="text-[#000000] font-bold">
                                Minuto(s)
                            </label>
                        </div>

                        <div class="flex flex-col items-center">
                            <input type="number" 
                            class="text-center flex-1 py-1 pl-4 px-2 rounded-[5px] font-bold text-[#000000] border placeholder:text-[#000000]/50 bg-[#FFFFFF] disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]"
                            min="0" max="59" v-model="tiempoSeg"
                            :disabled="!selectedPrenda || trackingActual?.cantidad_final_pieza || !selectedPieza"
                            :class="tiempoSegVal ? 'border-[#c41a1a] border-2' : 'border-[#63492a]'"
                            >
                            <label class="text-[#000000] font-bold">
                                Segundo(s)
                            </label>
                        </div>
                    </div>
                </div>
            </div>       

            <div class="grid grid-cols-2 w-full gap-x-2 pb-2">
                <button class="font-bold flex justify-center items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] enabled:hover:scale-102 disabled:bg-[#2630bb]/50"
                :disabled="!selectedPieza?.procesos?.length || !trackingActual?.proceso_actual || trackingActual?.proceso_actual <= 1 || trackingActual?.cantidad_final || selectedPrenda?.cantidad_final || trackingActual?.cantidad_final_pieza"
                @click="backwardProcess(trackingActual?.proceso_actual - 1)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-move-left-icon lucide-move-left size-4 mr-1"><path d="M6 8L2 12L6 16"/><path d="M2 12H22"/></svg>
                    Retroceder al proceso anterior
                </button>

                <button class="font-bold flex justify-center items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] enabled:hover:scale-102 disabled:bg-[#2630bb]/50"
                :disabled="!selectedPieza?.procesos?.length || (trackingActual?.proceso_actual || 0) >= selectedPieza?.procesos?.length || trackingActual?.cantidad_final || selectedPrenda?.cantidad_final || trackingActual?.cantidad_final_pieza"
                @click="forwardProcess((trackingActual?.proceso_actual || 0) + 1)"
                >
                    Avanzar al proceso siguiente
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-move-right-icon lucide-move-right size-4 ml-1"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                </button>
            </div>

            <div class="flex items-center w-full mb-2">
                <button class="w-full font-bold flex justify-center items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#3bb937] enabled:hover:scale-102 disabled:bg-[#3bb937]/50"
                :disabled="!trackingActual?.proceso_actual || !selectedPieza?.procesos?.length || trackingActual.proceso_actual < selectedPieza.procesos.length || selectedPrenda?.cantidad_final || trackingActual?.cantidad_final_pieza"
                @click="closeProductionPieza()">
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
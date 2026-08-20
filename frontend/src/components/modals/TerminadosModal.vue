<script setup lang="ts">
import { ref, computed } from 'vue';

const props = defineProps<{
    show: boolean
    modelValue: Record<string, any> | null
}>()
//console.log('modelValue: ', props.modelValue)

const emits = defineEmits([
    'close',
    'accept'
])

const selectedPrendaId = ref<number | string>('')
const selectedPiezaId = ref<number | string>('')
const selectedProcesoId = ref<number | string>('')

const selectedPrenda = computed(() => {
    const prendas = props.modelValue?.prendas_lote

    if(prendas && Array.isArray(prendas) && selectedPrendaId.value !== '') {
        //console.log('selectedPrenda: ', prendas.find((p:any) => p.prenda.id === selectedPrendaId.value))
        return prendas.find((p:any) => p.prenda.id === selectedPrendaId.value)
    }

    return null
})

const selectedPieza = computed(() => {
    const piezas = selectedPrenda.value?.prenda?.tipo_prenda.piezas

    if(piezas && Array.isArray(piezas) && selectedPiezaId.value !== '') {
        //console.log('selectedPieza: ', piezas.find((p:any) => p.id === selectedPiezaId.value))
        return piezas.find((p:any) => p.id === selectedPiezaId.value)
    }

    return null
})

const selectOptions = computed(() => {
    const prendas = props.modelValue?.prendas_lote

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

const mermaPrenda = computed(() => {
    if (!selectedPrenda.value) return '-';

    const prevista = selectedPrenda.value.cantidad_prevista;
    const final = selectedPrenda.value.cantidad_final_prenda;

    if (final === null || final === undefined) return '-';

    return Number(prevista) - Number(final);
});

const tiempoPrenda = computed(() => {
    if(!selectedPrenda.value) return {h: '00', m: '00', s: '00'}

    let total = 0

    const piezas = selectedPrenda.value?.prenda?.tipo_prenda.piezas || []

    piezas.forEach((item: any) => {
        item.prenda_lote.forEach((prenda_lote: any) => {
            if(prenda_lote.prenda_lote_id === selectedPrenda.value.id) {
                const horas = Number(prenda_lote.tiempo_final_hora) || 0
                const minutos = Number(prenda_lote.tiempo_final_minuto) || 0
                const segundos = Number(prenda_lote.tiempo_final_segundo) || 0

                total += (horas * 3600) + (minutos * 60) + segundos
            }
        })
    })

    return {
        h: String(Math.floor(total / 3600)).padStart(2, '0'),
        m: String(Math.floor((total % 3600) / 60)).padStart(2, '0'),
        s: String(total % 60).padStart(2, '0')
    }
})

const procesoStats = computed(() => {
    if(!selectedPrenda.value || !selectedPieza.value || !selectedProcesoId.value) return {cantidad: 0, h: '00', m: '00', s: '00'}

    const procesos  = selectedPieza.value.procesos || []
    const index = procesos.findIndex((p: any) => p.id === selectedProcesoId.value)

    if(index === -1) return {cantidad: 0, h: '00', m: '00', s: '00'}

    const ordenProceso = index + 1

    const loteActual = selectedPieza.value.prenda_lote?.find(
        (pl: any) => pl.prenda_lote_id === selectedPrenda.value.id
    )

    if(!loteActual || !loteActual.historial_procesos) return {cantidad: 0, h: '00', m: '00', s: '00'} 

    const historiales = loteActual.historial_procesos.filter(
        (h: any) => h.proceso_orden === ordenProceso
    )

    let cantidad = 0
    let sH = 0, sM = 0, sS = 0

    historiales.forEach((h: any) => {
        const cantReportada = Number(h.cantidad_procesada) || 0
        cantidad = Math.max(cantidad, cantReportada)

        sH += Number(h.tiempo_hora) || 0
        sM += Number(h.tiempo_minuto) || 0
        sS += Number(h.tiempo_segundo) || 0
    })

    const totalSegundos = (sH * 3600) + (sM * 60) + sS

    return {
        cantidad,
        h: String(Math.floor(totalSegundos / 3600)).padStart(2, '0'),
        m: String(Math.floor((totalSegundos % 3600) / 60)).padStart(2, '0'),
        s: String(totalSegundos % 60).padStart(2, '0')
    }
})

const closeModal = () => {
    selectedPrendaId.value = ''
    selectedPiezaId.value = ''
    selectedProcesoId.value = ''
    emits('close')
}

//console.log(selectedPrenda)
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="closeModal()">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[75vw] bg-[#ffffff] rounded-[10px] p-5">
            <div class="flex flex-col px-2 items-center ">
                <div class="flex items-center w-full  py-1">
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

                <div class="grid grid-cols-3 w-full gap-x-2 py-4">
                    <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                        Cantidad prevista: 
                        <span class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm text-[#2630bb]">
                            {{ selectedPrenda?.cantidad_prevista || '-'}}
                        </span>
                    </label>

                    <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                        Cantidad final producida: 
                        <span class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm text-[#000000]">
                            {{ selectedPrenda?.cantidad_final_prenda || '-'}}
                        </span>
                    </label>

                    <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                        Merma: 
                        <span class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm text-[#c41a1a]">
                            {{ mermaPrenda }}
                        </span>
                    </label>
                </div>

                <div class="flex flex-col items-center justify-center py-2 px-5 border  border-[#000000]/30 rounded-[10px] bg-[#f9f9f9] w-full"
                :class="{ 'opacity-50 pointer-events-none': !selectedPrendaId }">
                    <label class="text-[#000000] font-bold text-lg mb-1">
                        Desglose de procesos realizados
                    </label>

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

                    <div class="flex items-center w-full mb-2 py-1">
                        <label class="text-[#000000] font-bold text-lg mb-1">
                            Proceso: 
                        </label> 

                        <select v-model="selectedProcesoId" class="bg-[#FFFFFF] w-full py-2 px-2 rounded-[5px] ml-2 font-bold text-[#000000] border border-[#63492a] disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]">
                            <option value="" disabled>Seleccione una opción</option>
                            <option v-for="op in selectedPieza?.procesos" :key="op.id" :value="op.id">
                                {{ op.clave }} - {{ op.proceso.descripcion }}
                            </option>
                        </select>
                    </div>

                    <div class="flex-col items-center w-full py-1">
                        <div class="flex py-2 border rounded-[10px] overflow-x-auto max-w-full px-5">
                            <label v-if="!selectedProcesoId"
                            class="font-bold">
                                Seleccione un proceso
                            </label>

                            <div v-else class="w-full flex justify-center items-center py-2 gap-10">
                                <label class="text-[#000000] font-bold py-2">
                                    Cantidad procesada:
                                    <span class="bg-[#e4e4e4] text-[#000000] px-5 py-2 rounded-[10px] font-bold mx-1 text-center">
                                        {{ procesoStats.cantidad }}
                                    </span>
                                </label>

                                <label class="text-[#000000] font-bold py-2">
                                    Tiempo ocupado por proceso:
                                    <span class="bg-[#e4e4e4] text-[#c41a1a] px-5 py-2 rounded-[10px] font-bold mx-1 text-center">
                                        {{ procesoStats.h }} : {{ procesoStats.m }} : {{ procesoStats.s }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full grid grid-cols-2 gap-2 py-2">
                    <div class="flex flex-col items-center justify-center py-2 px-5 border  border-[#000000]/30 rounded-[10px] bg-[#f9f9f9] w-full"
                    :class="{ 'opacity-50 pointer-events-none': !selectedPrendaId }">
                        <label class="text-[#000000] font-bold py-2">
                            Tiempo ocupado para la pieza:
                            <span class="bg-[#e4e4e4] text-[#c41a1a] px-5 py-2 rounded-[10px] font-bold mx-1 text-center">
                                {{ String(selectedPieza?.prenda_lote?.find((lote: any) => lote.prenda_lote_id === selectedPrenda?.id).tiempo_final_hora ?? 0).padStart(2, '0') || '-' }} : 
                                {{ String(selectedPieza?.prenda_lote?.find((lote: any) => lote.prenda_lote_id === selectedPrenda?.id).tiempo_final_minuto ?? 0).padStart(2, '0') || '-' }} : 
                                {{ String(selectedPieza?.prenda_lote?.find((lote: any) => lote.prenda_lote_id === selectedPrenda?.id).tiempo_final_segundo ?? 0).padStart(2, '0') || '-' }}
                            </span>
                        </label>
                    </div>

                    <div class="flex flex-col items-center justify-center py-2 px-5 border  border-[#000000]/30 rounded-[10px] bg-[#f9f9f9] w-full"
                    :class="{ 'opacity-50 pointer-events-none': !selectedPrendaId }">
                        <label class="text-[#000000] font-bold py-2">
                            Tiempo ocupado para la prenda:
                            <span class="bg-[#e4e4e4] text-[#c41a1a] px-5 py-2 rounded-[10px] font-bold mx-1 text-center">
                                {{ tiempoPrenda.h }} : 
                                {{ tiempoPrenda.m }} : 
                                {{ tiempoPrenda.s }}
                            </span>
                        </label>
                    </div>
                </div>

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
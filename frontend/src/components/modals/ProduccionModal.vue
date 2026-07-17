<script setup lang="ts">
import { reactive, ref, computed } from 'vue';

const props = defineProps<{
    show: boolean
    modelValue: Record<string, any> | null
}>()

const emits = defineEmits([
    'close',
    'accept'
])

const formData = reactive<Record<string, any>>({});
const selectedPrendaId = ref<number | string>('')

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

const selectedPrenda = computed(() => {
    const prendas = props.modelValue?.prendas

    if(prendas && Array.isArray(prendas) && selectedPrendaId.value !== '') {
        return prendas.find((p:any) => p.prenda.id === selectedPrendaId.value)
    }

    return null
})

console.log('model: ', props.modelValue)
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="emits('close')">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[80vw] bg-[#ffffff] rounded-[15px] p-5">
            <div class="flex flex-col px-2 items-center pb-2">
                <div class="flex items-center w-full mb-2 py-1">
                    <label class="text-[#000000] font-bold text-lg mb-1">
                        Prenda: 
                    </label> 

                    <select v-model="selectedPrendaId" class="bg-[#FFFFFF] w-full py-2 px-5 rounded-[5px] ml-2 font-bold text-[#000000] border border-[#63492a] disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]">
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

                    <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                        Cantidad proceso: 
                        <span class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm">
                            {{ selectedPrenda?.cantidad_proceso || '-'}}
                        </span>
                    </label>

                    <label class="text-[#000000] font-bold text-lg mb-1 text-center">
                        Cantidad final: 
                        <span class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm">
                            {{ selectedPrenda?.cantidad_final || '-'}}
                        </span>
                    </label>
                </div>

                <div class="grid grid-cols-3 w-full gap-x-2">
                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px]">
                        <label class="text-[#000000] font-bold text-base mb-1">
                            Proceso anterior
                        </label>
                    </div>

                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px]">
                        <label class="text-[#000000] font-bold text-base mb-1">
                            Proceso actual
                        </label>
                    </div>

                    <div class="flex flex-col items-center border border-[#63492a] rounded-[15px]">
                        <label class="text-[#000000] font-bold text-base mb-1">
                            Proceso siguiente
                        </label>
                    </div>
                </div>
            </div>            

            <div class="">

            </div>

        <div class="mt flex items-center justify-between pt-2 border-[#63492a] border-t-2">
            <button class="w-full rounded-[5px] font-bold text-lg text-[#ffffff] py-2 bg-[#c41a1a] cursor-pointer hover:scale-101"
            @click="emits('close')">
                Cerrar
            </button>
        </div>
        </div>
    </div>
</template>
<script setup lang="ts">
const props = defineProps<{
    show: boolean
    text: string
    startProduction?: boolean
}>()

const emits = defineEmits([
    'confirm',
    'close'
])
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="emits('close')">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[30vw] max-h-[30vh] bg-[#ffffff] rounded-[15px] p-5">
            <h1 class="text-xl w-full text-center font-bold text-[#000000] pb-2 border-[#63492a] border-b-2">
                {{text}}
            </h1>

            <div class="mt flex-col items-center justify-between pt-2 border-[#63492a] border-t">
                
                <button class="w-full my-1 rounded-[5px] font-bold text-lg text-[#ffffff] py-2 cursor-pointer hover:scale-105 transition-all duration-300 ease-out hover:shadow-2xl"
                :class="text === '¿Iniciar proceso de producción?' ? 'bg-[#3bb937]' : 'bg-[#c41a1a]'"
                @click="emits('confirm')">
                Confirmar
                </button>
                <button class="w-full my-1 rounded-[5px] font-bold text-lg text-[#c41a1a] py-2 bg-[#e4e4e4] cursor-pointer hover:scale-105 transition-all duration-300 ease-out hover:shadow-2xl"
                @click="emits('close')">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</template>
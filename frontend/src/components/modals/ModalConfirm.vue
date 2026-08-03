<script setup lang="ts">
const props = defineProps<{
    show: boolean
    text: string
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

            <div class="mt flex items-center justify-between pt-2 border-[#63492a] border-t">
                <button class="w-full mr-1 rounded-[5px] font-bold text-lg text-[#c41a1a] py-2 bg-[#ffffff] cursor-pointer hover:scale-102 shadow-2xs border border-[#]"
                @click="emits('close')">
                    Cancelar
                </button>

                <button class="w-full ml-1 rounded-[5px] font-bold text-lg text-[#ffffff] py-2 bg-[#c41a1a] cursor-pointer hover:scale-102"
                @click="emits('confirm')">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</template>
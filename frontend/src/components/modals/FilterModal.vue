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
        class="flex flex-col justify-center w-full max-w-[50vw] max-h-[50vh] bg-[#ffffff] rounded-[15px] p-5">
        </div>
    </div>
</template>
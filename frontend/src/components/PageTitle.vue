<script setup lang="ts">
defineProps({
    name: String,
    hideButton: Boolean
})

const emits = defineEmits([
    'store'
])
</script>

<template>
    <div class="w-full flex items-center justify-between">
        <h1 class="flex-1 text-[#ffffff] py-2 px-5 rounded-[5px] bg-[#000000] font-bold shadow-2xs mr-1">
            {{ name }}
        </h1>

        <button v-if="!hideButton" class="font-bold flex items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] hover:scale-102 ml-1"
        @click="emits('store')">
            Crear nuevo
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-plus-icon lucide-plus size-5 ml-1"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
        </button>
    </div>
</template>
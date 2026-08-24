<script setup lang="ts">
defineProps<{
    name: string,
    hideStore: boolean,
    hideFilter: boolean,
    isLoading: boolean
}>()

const emits = defineEmits([
    'store',
    'filter'
])
</script>

<template>
    <div class="w-full flex items-center justify-between overflow-hidden">
        <h1 class="flex-1 text-[#ffffff] py-2 px-5 rounded-[5px] bg-[#000000] font-bold shadow-2xs mr-1">
            {{ name }}
        </h1>

        <button v-if="!hideFilter" 
        :disabled="isLoading"
        class="font-bold flex items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#c41a1a] hover:scale-105 mx-1 disabled:bg-[#c41a1a]/50 transition-all duration-300 ease-out hover:shadow-2xl"
        @click="emits('filter')">
            Filtrar
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-funnel-icon lucide-funnel size-5 ml-1"><path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"/></svg>
        </button>

        <button v-if="!hideStore" 
        :disabled="isLoading"
        class="font-bold flex items-center py-2 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] hover:scale-105 ml-1 disabled:bg-[#2630bb]/50 transition-all duration-300 ease-out hover:shadow-2xl"
        @click="emits('store')">
            Crear nuevo
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-plus-icon lucide-plus size-5 ml-1"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
        </button>
    </div>
</template>
<script setup lang="ts">
const props = defineProps<{
    currentPage: number
    lastPage: number
    disabled: boolean
}>()

const emits = defineEmits([
    'changePage'
])

const nextPage = () => {
    const nextPage = props.currentPage + 1
    if(nextPage > props.lastPage) return
    emits('changePage', nextPage)
}

const previousPage = () => {
    const previousPage = props.currentPage - 1
    if(previousPage < 1) return
    emits('changePage', previousPage)
}
</script>

<template>
    <div class="flex items-center">
        <button 
        :disabled="currentPage === 1 || disabled"
        class="font-bold flex justify-center items-center py-2 px-16 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] enabled:hover:scale-105 disabled:bg-[#2630bb]/50 transition-all duration-300 ease-out hover:shadow-2xl"
        @click="previousPage()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-move-left-icon lucide-move-left size-4"><path d="M6 8L2 12L6 16"/><path d="M2 12H22"/></svg>
        </button>

        <label 
        class="bg-[#ffffff] text-[#c41a1a] px-5 py-2 rounded-[10px] font-bold mx-2 text-center">
            {{ currentPage }}
        </label>

        <button
        :disabled="currentPage === lastPage || disabled"
        class="font-bold flex justify-center items-center py-2 px-16 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#2630bb] enabled:hover:scale-105 disabled:bg-[#2630bb]/50 transition-all duration-300 ease-out hover:shadow-2xl"
        @click="nextPage()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-move-right-icon lucide-move-right size-4"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
        </button>
    </div>
</template>
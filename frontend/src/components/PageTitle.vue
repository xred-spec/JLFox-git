<script setup lang="ts">
defineProps({
    name: String,
    add: String
})

const emits = defineEmits([
    'store'
])
</script>

<template>
    <div class="w-full flex items-center justify-between pt-1">
        <h1 class="text-[#000000] text-xl font-bold shadow-2xl">
            {{ name }}
        </h1>

        <button class="font-bold flex items-center border-2 py-1 px-2 rounded-[5px] text-[#000000] border-[#2630bb] cursor-pointer hover:bg-[#2630bb] hover:text-[#ffffff]"
        @click="emits('store')">
            Crear nuevo
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-plus-icon lucide-plus size-5 ml-1"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
        </button>
    </div>
</template>
<script setup lang="ts">
defineProps({
    name: String,
    selected: Boolean,
})

const emits = defineEmits([
    'select'
])
</script>

<template>
    <button class="group w-full flex items-center justify-end py-2 font-bold border-b border-[#000000] cursor-pointer  text-[#000000]"
    :class="selected ? 'bg-[#e4e4e4]' : 'bg-[#ffffff]'"
    @click="emits('select')">
        <p>{{ name }}</p>

        <div class="bar ml-2 px-2 transition-all duration-300 ease-in-out " 
        :class="selected ? 'bg-[#c41a1a] text-[#c41a1a] px-10 group-hover:px-12' : 'bg-[#000000] text-[#000000] group-hover:px-10'">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-dot-icon lucide-dot size-3"><circle cx="12" cy="12" r="1"/></svg>
        </div>
    </button>
</template>
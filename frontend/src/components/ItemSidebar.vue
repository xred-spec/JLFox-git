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
    <button class="w-full flex items-center justify-start py-2 px-2 font-bold border-b-2 border-[#ac7b3a] cursor-pointer"
    :class="selected ? 'bg-[#503a1e] text-[#ffffff]' : 'bg-[#c7a579] text-[#000000]'"
    @click="emits('select')">
        <p>{{ name }}</p>
    </button>
</template>
<script setup lang="ts">
defineProps({
    name: String,
    selected: Boolean
})

const emits = defineEmits([
    'select'
])
</script>

<template>
    <button class="flex flex-1 items-center justify-center font-bold py-2 cursor-pointer hover:scale-102 shadow-2xl"
    :class="selected ? 'bg-[#000000] text-[#ffffff]' : 'bg-[#ffffff] text-[#000000] border-b-2 border-[#000000]'"
    @click="emits('select')">
        {{ name }}
    </button>
</template>
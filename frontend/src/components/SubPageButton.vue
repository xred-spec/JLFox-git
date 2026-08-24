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
    <button class="flex flex-1 items-center justify-center font-bold py-2 cursor-pointer hover:scale-104 shadow-2xs border-b-3 border-[#3bb937] transition-all duration-300 ease-out hover:shadow-2xl"
    :class="selected ? 'bg-[#3bb937] text-[#ffffff]' : 'bg-[#ffffff] text-[#000000]'"
    @click="emits('select')">
        {{ name }}
    </button>
</template>
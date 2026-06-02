<script setup lang="ts">
defineProps({
    name: String,
})
</script>

<template>
    <h1 class="flex flex-1 items-center justify-center bg-[#000000] text-[#ffffff] text-xl font-bold py-2 shadow-2xl">
        {{ name }}
    </h1>
</template>
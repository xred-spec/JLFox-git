<script setup lang="ts">
defineProps({
    name: String,
    open: Boolean,
})

const emits = defineEmits(['toogle'])
</script>

<template>
    <div class="w-full flex items-center justify-start py-2 px-2 font-bold bg-[#000000] text-[#ffffff]">
        <p>{{ name }}</p>
    </div>
</template>
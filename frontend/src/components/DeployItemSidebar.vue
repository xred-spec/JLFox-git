<script setup lang="ts">
defineProps({
    name: String,
    open: Boolean,
})

const emits = defineEmits(['toogle'])
</script>

<template>
    <div class="w-full flex items-center justify-start py-2 px-2 font-bold"
    :class="open ? 'bg-[#503a1e] text-[#ffffff]' : 'bg-[#c7a579] text-[#000000]'">
        <p>{{ name }}</p>
    </div>
</template>
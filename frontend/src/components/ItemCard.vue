<script setup lang="ts">    
import { ref } from 'vue';
import type { Column } from '@/interfaces/DataColumn';

const props = defineProps <{
    item: Record<string, any>
    index: number
    columns: Column[]
    show: boolean
}>()

const getValues = () => {
    let values = Object.values(props.item)
    return values
}

const emits = defineEmits<{
    (e: 'update', id: number): void,
    (e: 'delete', id: number): void
}>()

const itemValues = getValues()
</script>

<template>
    <div class="flex rounded-[10px] w-full items-center justify-between mb-1 py-1 px-5 border bg-[#ffffff] border-[#63492a] shadow-2xs"> 
        <div v-for="c in columns">
            <div v-if="c.key === 'options'"
            class="flex items-center justify-between py-1">
                <button 
                @click="emits('update', props.item.id)"
                class="flex py-3 px-5 justify-center items-center rounded-r-none rounded-[5px] bg-[#faee46] text-[#000000] font-bold cursor-pointer hover:scale-102">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-pencil-icon lucide-pencil size-4"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                </button>

                <button
                @click="emits('delete', props.item.id)"
                class="flex py-3 px-5 justify-center items-center rounded-l-none rounded-[5px] bg-[#c41a1a] text-[#ffffff] font-bold cursor-pointer hover:scale-102">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-trash2-icon lucide-trash-2 size-4"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                </button>
            </div>
            <p v-else-if="c.key === 'index'" class="font-bold text-[#c41a1a]">
                {{ index }}
            </p>
            <p v-else class="text-[#000000] font-bold">
                {{ props.item[c.key] }}
            </p>
        </div>
    </div>
</template>
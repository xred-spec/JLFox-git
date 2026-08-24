<script setup lang="ts">    
import { ref } from 'vue';
import type { Column } from '@/interfaces/DataColumn';
import ModalConfirm from './modals/ModalConfirm.vue';

const props = defineProps <{
    item: Record<string, any>
    index: number
    columns: Column[]
    grids: number
    show: boolean
}>()

const modalOpened = ref(false)

const getForeignValues = (object: any, rute: string) => {
    if(object[rute] === null) return '-'

    if(rute.includes('tiene_') && object[rute] === 1) return '✓' 
    else if(rute.includes('tiene_') && object[rute] === 0) return '-' 

    if(!rute.includes('.')) {
        if(object[rute] === null) return '-'
        return object[rute]
    }
    
    return rute.split('.').reduce((acumulator, part) => {
        return acumulator ? acumulator[part] : '-' 
    }, object)
}


const emits = defineEmits<{
    (e: 'update', id: number): void,
    (e: 'delete', id: number): void
}>()

//console.log('item: ', props.item)
</script>

<template>
    <ModalConfirm 
    :show="modalOpened"
    :text="'¿Eliminar registro?'"
    @confirm="emits('delete', props.item.id)"
    @close="modalOpened = false"
    />

    <div class="grid rounded-[10px] w-full mb-1 py-1 px-5 items-center border bg-[#ffffff] border-[#63492a] shadow-2xs relative"
    :style="{ gridTemplateColumns: `repeat(${props.grids}, minmax(0, 1fr))` }"> 
        <div v-for="c in columns">
            <div v-if="c.key === 'options'"
            class="flex items-center justify-end">
                <p class="font-bold mr-1 text-sm">
                    {{ c.label }}: 
                </p>

                <div class="flex  px-2 py-2 rounded-[10px]">
                    <button 
                    @click="emits('update', props.item.id)"
                    class="flex py-2 px-4 justify-center items-center rounded-[5px] bg-[#faee46] text-[#000000] text-xs font-bold cursor-pointer hover:scale-110 mr-0.5 transition-all duration-300 ease-out hover:shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="lucide lucide-pencil-icon lucide-pencil size-3 ml-1"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                    </button>

                    <button
                    @click="modalOpened = true"
                    class="flex py-2 px-4 justify-center items-center rounded-[5px] bg-[#c41a1a] text-[#ffffff] text-xs font-bold cursor-pointer hover:scale-110 ml-0.5 transition-all duration-300 ease-out hover:shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="lucide lucide-trash2-icon lucide-trash-2 size-3 ml-1"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    </button>
                </div>
            </div>
            <div v-else-if="c.key === 'index'" class="flex items-center justify-start">
                <div class="bg-[#c41a1a] flex items-center justify-center  rounded-[10px] py-2 px-4 top-0 left-2">
                    <label class="text-[#ffffff] font-bold">
                        {{ props.index }}
                    </label>
                </div>
            </div>
            <div v-else class="flex items-center justify-center">
                <p class="font-bold mr-1 text-sm">
                    {{ c.label }}: 
                </p>

                <div class="flex bg-[#e4e4e4] px-2 py-2 rounded-[10px] font-bold text-sm overflow-hidden">
                    {{ getForeignValues(props.item, c.key) }}
                </div>
            </div>
        </div>
    </div>
</template>
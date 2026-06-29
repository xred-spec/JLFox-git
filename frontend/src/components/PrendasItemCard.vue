<script setup lang="ts">
import { ref } from 'vue';
import type { Column } from '@/interfaces/DataColumn';

const expanded = ref(false)

const props = defineProps <{
    item: Record<string, any>
    index: number
    columns: Column[]
    show: boolean
}>()

const getForeignValues = (object: any, rute: string) => {
    if(object[rute] === null && object[rute]) return '-'

    if(rute.includes('tiene_') && object[rute] === 1) return 'Con cartera' 
    else if(rute.includes('tiene_') && object[rute] === 0) return 'Sin cartera' 

    if(!rute.includes('.')) {
        if(object[rute] === null || !object[rute]) return '-'
        return object[rute]
    }
    
    const value = rute.split('.').reduce((acumulator, part) => {
        return (acumulator !== null && acumulator !== undefined) ? acumulator[part] : null;
    }, object)

    return (value === null || value === undefined || value === '') ? '-' : value;
}

const emits = defineEmits<{
    (e: 'update', id: number): void,
    (e: 'delete', id: number): void
}>()
//console.log('item: ', props.item)
</script>

<template>
    <div class="flex flex-col rounded-[10px] w-full items-center justify-between mb-1 py-1 px-2 border bg-[#ffffff] border-[#63492a] shadow-2xs"> 
        <div v-if="!expanded" class="flex w-full justify-start px-5">
            <p class="font-bold text-[#c41a1a] text-base mr-2">
                {{ props.index }}.
            </p>

            <template v-for="column in props.columns">
                <p v-if="column.key === 'tipo_prenda.nombre'" class="font-bold text-base mr-1">
                    {{ getForeignValues(props.item, column.key) }} - 
                </p>
                <p v-else-if="column.key === 'color_tela.color'" class="font-bold text-base mr-1">
                    {{ getForeignValues(props.item, column.key) }}
                </p>
                <p v-else-if="column.key === 'color_tela.tela.nombre'" class="font-bold text-base mr-1">
                    {{ getForeignValues(props.item, column.key) }}, 
                </p>
            </template>
        </div>

        <div class="flex w-full py-1.5 rounded-[10px]"
        :class="expanded ? 'flex-col bg-[#ffffff]' : 'justify-between bg-[#e4e4e4] px-5'">
            <template v-if="!expanded">
                <label class="font-bold text-sm px-5 text-[#ffffff] rounded-[10px]"
                :class="getForeignValues(props.item, 'tipo') === 'Niño' ? 'bg-[#3bb937]' : 'bg-[#2630bb]'">
                    {{ getForeignValues(props.item, 'tipo') }} 
                </label>

                <button class="font-bold text-sm cursor-pointer hover:underline" 
                @click="expanded = true"> 
                    Mostrar detalles
                </button>
            </template>

            <template v-else-if="expanded">
                <div class="grid grid-cols-3 pl-14 relative">
                    <div class="bg-[#c41a1a] flex items-center justify-center absolute rounded-[10px] rounded-t-none p-4 -top-2.5 left-0">
                        <label class="text-[#ffffff] font-bold">
                            {{ props.index }}
                        </label>
                    </div>
                    <div v-for="column in props.columns" class="p-2">
                        <label v-if="column.key != 'index'" class="font-bold text-lg mr-1 text-[#000000]">
                            {{ column.label }}: 
                        </label>
                        <span v-if="column.key != 'index'" class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold">
                            {{ props.index || getForeignValues(props.item, column.key) }}
                        </span>
                    </div>
                </div>

                <div class="bg-[#e4e4e4] rounded-[10px] flex justify-between items-center px-5 py-2 mt-1.5">
                    <div class="flex">
                        <button class="flex py-1 px-4 justify-center items-center rounded-r-none rounded-[5px] bg-[#faee46] text-[#000000] text-sm font-bold cursor-pointer hover:scale-105"
                        @click="emits('update', props.item.id)">
                            Editar
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-pencil-icon lucide-pencil size-3 ml-1"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                        </button>

                        <button class="flex py-1 px-4 justify-center items-center rounded-l-none rounded-[5px] bg-[#c41a1a] text-[#ffffff] text-sm font-bold cursor-pointer hover:scale-105"
                        @click="emits('delete', props.item.id)">
                            Eliminar
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-trash2-icon lucide-trash-2 size-3 ml-1"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        </button>
                    </div>

                    <button class="font-bold text-sm cursor-pointer hover:underline" 
                    @click="expanded = false"> 
                        Ocultar detalles
                    </button>
                </div>
            </template>
        </div>
    </div>
</template>
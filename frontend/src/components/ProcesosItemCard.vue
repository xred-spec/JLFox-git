<script setup lang="ts">
import { ref } from 'vue';
import type { Column } from '@/interfaces/DataColumn';
import ModalConfirm from './modals/ModalConfirm.vue';

const expanded = ref(false)
const modalOpened = ref(false)

const props = defineProps <{
    item: Record<string, any>
    index: number
    columns: Column[]
    show: boolean
}>()

const getForeignValues = (object: any, rute: string) => {
    if (!object || !rute) return '-';

    const normalizedRoute = rute.replace(/\[(\d+)\]/g, '.$1')

    const navigate = (obj: any, path: string) => {
        return path.split('.').reduce((acc, part) => {
            return (acc !== null && acc !== undefined) ? acc[part] : null
        }, obj)
    }

    let value = navigate(object, normalizedRoute)

    if ((value === null || value === undefined) && object.pieza_prenda_proceso && object.pieza_prenda_proceso[0]) {
        value = navigate(object.pieza_prenda_proceso[0], normalizedRoute)
    }
    
    return (value === null || value === undefined || value === '') ? '-' : value
}

const emits = defineEmits<{
    (e: 'update', id: number): void,
    (e: 'delete', id: number): void
}>()
</script>

<template>
    <ModalConfirm 
    :show="modalOpened"
    :text="'¿Eliminar registro?'"
    @confirm="emits('delete', props.item.id)"
    @close="modalOpened = false"
    />
    
    <div class="flex flex-col rounded-[10px] w-full items-center justify-between mb-1 py-1 px-2 border bg-[#ffffff] border-[#63492a] shadow-2xs"
    @click="expanded = !expanded"> 
        <div v-if="!expanded" class="flex w-full justify-start items-center px-5 py-1">
            <div class="bg-[#c41a1a] flex items-center justify-center rounded-[10px] py-0.5 px-2 mr-2">
                <label class="text-[#ffffff] font-bold">
                    {{ props.index }}
                </label>
            </div>

            <template v-for="column in props.columns">
                <p v-if="column.key === 'pieza_prenda_proceso[0].clave'" class="font-bold text-base mr-1">
                    <span class="text-[#2630bb]">{{ getForeignValues(props.item, column.key) }}</span> - 
                </p>
                <p v-if="column.key === 'pieza_prenda.tipo_prenda.nombre'" class="font-bold text-base mr-1">
                    {{ getForeignValues(props.item, column.key) }},  
                </p>
                <p v-if="column.key === 'pieza_prenda.nombre'" class="font-bold text-base mr-1">
                    {{ getForeignValues(props.item, column.key) }}
                </p>
            </template>
        </div>

        <div class="flex w-full py-1.5 rounded-[10px]"
        :class="expanded ? 'flex-col bg-[#ffffff]' : 'justify-end bg-[#e4e4e4] px-5'">
            <template v-if="!expanded">
                <button class="font-bold text-sm cursor-pointer hover:underline" 
                @click.stop="expanded = true"> 
                    Mostrar detalles
                </button>
            </template>

            <template v-else-if="expanded">
                <div class="grid grid-cols-3 pl-12 relative">
                    <div class="bg-[#c41a1a] flex items-center justify-center absolute rounded-[10px] rounded-t-none p-4 -top-2.5 left-0">
                        <label class="text-[#ffffff] font-bold">
                            {{ props.index }}
                        </label>
                    </div>

                    <div v-for="column in props.columns" class="p-2">
                        <label v-if="column.key != 'index' && column.key !== 'descripcion'" class="font-bold text-lg mr-1 text-[#000000]">
                            {{ column.label }}: 
                        </label>
                        <span v-if="column.key != 'index' && column.key !== 'descripcion'" 
                        :class="column.key !== '' ? 'bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold' : ''">
                            {{ getForeignValues(props.item, column.key) }}
                        </span>
                    </div>
                </div>

                <div class="w-full flex p-2 items-center border-b-2 border-[#63492a] pb-2">
                    <label class="text-[#000000] font-bold">
                        Descripción:
                    </label>

                    <label class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold ml-1 text-start flex-1">
                        {{ item.descripcion }}
                    </label>
                </div>

                <div class="bg-[#e4e4e4] rounded-[10px] flex justify-between gap-2 items-center px-5 py-2 mt-1.5">
                    <div class="flex">
                        <button class="flex py-1 px-4 mr-1 justify-center items-center rounded-[5px] bg-[#faee46] text-[#000000] text-sm font-bold cursor-pointer hover:scale-110 transition-all duration-300 ease-out hover:shadow-2xl"
                        @click.stop="emits('update', props.item.id)">
                            Editar
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                            class="lucide lucide-pencil-icon lucide-pencil size-3 ml-1"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                        </button>

                        <button class="flex py-1 px-4 ml-1 justify-center items-center rounded-[5px] bg-[#c41a1a] text-[#ffffff] text-sm font-bold cursor-pointer hover:scale-110 transition-all duration-300 ease-out hover:shadow-2xl"
                        @click.stop="modalOpened = true">
                            Eliminar
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                            class="lucide lucide-trash2-icon lucide-trash-2 size-3 ml-1"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        </button>
                    </div>

                    <button class="font-bold text-sm cursor-pointer hover:underline" 
                    @click.stop="expanded = false"> 
                        Ocultar detalles
                    </button>
                </div>
            </template>
        </div>
    </div>
</template>
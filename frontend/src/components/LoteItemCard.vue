<script setup lang="ts">    
import { ref } from 'vue';
import type { Column } from '@/interfaces/DataColumn';
import ModalConfirm from './modals/ModalConfirm.vue';
import ProduccionModal from './modals/ProduccionModal.vue';

const props = defineProps <{
    item: Record<string, any>
    index: number
    columns: Column[]
    grids: number
    show: boolean
}>()

const expanded = ref(false)

const modalConfirmOpened = ref(false)
const modalConfirmText = ref('')

const modalProduccionOpened = ref(false)
const actionModal = ref('')

switch(props.item.estado) {
    case 'pendiente' : {
        modalConfirmText.value = '¿Iniciar proceso de producción?'
    }
}

const modalConfirm = (text: string, action: string, id?: number) => {
    modalConfirmText.value = text
    actionModal.value = action
    modalConfirmOpened.value = true
}

const modalConfirmClose = () => {
    modalConfirmText.value = ''
    actionModal.value = ''
    modalConfirmOpened.value = false
}

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
    (e: 'delete', id: number): void,
    (e: 'state', id: number, state: string): void,
    (e: 'production', id: number): void
    (e: 'get'): void
    (e: 'data'): void
}>()

//console.log('columns: ', props.columns)
</script>

<template>
    <ProduccionModal 
    :show="modalProduccionOpened"
    :model-value="props.item"
    @close="modalProduccionOpened = false"
    @accept="emits('get')"
    />

    <ModalConfirm 
    :text="modalConfirmText"
    :show="modalConfirmOpened"
    @close="modalConfirmClose()"
    @confirm="actionModal === 'start' ? emits('state', props.item.id, 'proceso') : emits('delete', props.item.id), modalConfirmClose()"
    />

    <div class="flex flex-col rounded-[10px] w-full items-center justify-between mb-1 py-1 px-2 border bg-[#ffffff] border-[#63492a] shadow-2xs">
        <div v-if="!expanded" class="flex w-full justify-start items-center px-5 py-1">
            <div class="bg-[#c41a1a] flex items-center justify-center rounded-[10px] py-0.5 px-2 mr-2">
                <label class="text-[#ffffff] font-bold">
                    {{ props.index }}
                </label>
            </div>
        
            <template v-for="column in props.columns">
                <p v-if="column.key === 'fecha_inicio'" class="font-bold text-sm mr-1">
                    Inicio de producción: 
                    <span class="bg-[#e4e4e4] px-5 py-1 rounded-[10px] font-bold text-[#c41a1a]">
                        {{ getForeignValues(props.item, column.key) }}  
                    </span>
                </p>
                <p v-else-if="column.key === 'fecha_final'" class="font-bold text-sm ml-5">
                    Final de producción: 
                    <span class="bg-[#e4e4e4] px-5 py-1 rounded-[10px] font-bold text-[#c41a1a]">
                        {{ getForeignValues(props.item, column.key) }}
                    </span>
                </p>
            </template>
        </div>

        <div class="flex w-full py-1.5 rounded-[10px]"
        :class="expanded ? 'flex-col bg-[#ffffff]' : 'justify-between bg-[#e4e4e4] px-5'">
            <template v-if="!expanded">
                <template v-if="getForeignValues(props.item, 'estado') === 'pendiente'">
                    <label class="font-bold text-sm px-5 text-[#ffffff] rounded-[10px] bg-[#c41a1a]">
                        pendiente
                    </label>
                </template>

                <template v-else-if="getForeignValues(props.item, 'estado') === 'produccion'">
                    <label class="font-bold text-sm px-5 text-[#ffffff] rounded-[10px] bg-[#3bb937]">
                        producción
                    </label>
                </template>

                <template v-else-if="getForeignValues(props.item, 'estado') === 'terminado'">
                    <label class="font-bold text-sm px-5 text-[#ffffff] rounded-[10px] bg-[#2630bb]">
                        terminado
                    </label>
                </template>

                <button class="font-bold text-sm cursor-pointer hover:underline" 
                @click="expanded = true"> 
                    Mostrar detalles
                </button>
            </template>

            <template v-else-if="expanded">
                <div class="grid grid-cols-3 relative">
                    <div class="bg-[#c41a1a] flex items-center justify-start absolute rounded-[10px] rounded-t-none px-4 py-3 -top-2.5 left-0">
                        <label class="text-[#ffffff] font-bold">
                            {{ props.index }}
                        </label>
                    </div>
                    <div v-for="column in props.columns" class="flex px-2 justify-center items-center">
                        <label v-if="column.key != 'index'" class="font-bold text-base mr-1 text-[#000000]">
                            {{ column.label }}: 
                        </label>
                        <span v-if="column.key != 'index'" class="bg-[#e4e4e4] px-5 py-2 rounded-[10px] font-bold text-sm">
                            {{ getForeignValues(props.item, column.key) }}
                        </span>
                    </div>
                </div>

                <div class="bg-[#e4e4e4] rounded-[10px] flex justify-between gap-2 items-center px-5 py-2 mt-1.5">
                    <div class="flex">

                        <template v-if="props.item.estado === 'pendiente'">
                            <button class="flex py-1 px-4 mr-1 justify-center items-center rounded-[5px] bg-[#3bb937] text-[#ffffff] text-sm font-bold cursor-pointer hover:scale-105"
                            @click="modalConfirm('¿Iniciar proceso de producción?', 'start')">
                                Comenzar producción
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                class="lucide lucide-play-icon lucide-play size-3 ml-1"><path d="M5 5a2 2 0 0 1 3.008-1.728l11.997 6.998a2 2 0 0 1 .003 3.458l-12 7A2 2 0 0 1 5 19z"/></svg>
                            </button>

                            <button class="flex py-1 px-4 mx-1 justify-center items-center rounded-[5px] bg-[#faee46] text-[#000000] text-sm font-bold cursor-pointer hover:scale-105"
                            @click="emits('update', props.item.id)">
                                Editar
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                class="lucide lucide-pencil-icon lucide-pencil size-3 ml-1"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                            </button>
                        </template>

                        <template v-if="props.item.estado === 'produccion'">
                            <button class="flex py-1 px-4 mr-1 justify-center items-center rounded-[5px] bg-[#3bb937] text-[#ffffff] text-sm font-bold cursor-pointer hover:scale-105"
                            @click="modalProduccionOpened = true">
                                Gestionar producción
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                class="lucide lucide-factory-icon lucide-factory size-3 ml-1"><path d="M12 16h.01"/><path d="M16 16h.01"/><path d="M3 19a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.5a.5.5 0 0 0-.769-.422l-4.462 2.844A.5.5 0 0 1 15 10.5v-2a.5.5 0 0 0-.769-.422L9.77 10.922A.5.5 0 0 1 9 10.5V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2z"/><path d="M8 16h.01"/></svg>
                            </button>
                        </template>

                        <template v-if="props.item.estado === 'terminado'">
                            <button class="flex py-1 px-4 mr-1 justify-center items-center rounded-[5px] bg-[#2630bb] text-[#ffffff] text-sm font-bold cursor-pointer hover:scale-105"
                            @click="emits('data')">
                                Mostrar detalles
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                class="lucide lucide-info-icon lucide-info size-3 ml-1"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                            </button>
                        </template>

                        <button class="flex py-1 px-4 ml-1 justify-center items-center rounded-[5px] bg-[#c41a1a] text-[#ffffff] text-sm font-bold cursor-pointer hover:scale-105"
                        @click="modalConfirm('¿Está seguro de eliminar?', 'delete')">
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
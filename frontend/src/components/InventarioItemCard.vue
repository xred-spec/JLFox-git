<script setup lang="ts">
import { ref, computed } from 'vue';
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

const cantidadInventario = computed(() => {
    const inventario = props.item.inventario;
    if (!inventario) return 0;

    if (Array.isArray(inventario)) {
        if (inventario.length === 0) return 0;
        return inventario[0].cantidad || 0;
    }

    return inventario.cantidad || 0;
});
//console.log('item: ', props.item)
</script>

<template>
    <div class="flex flex-col rounded-[10px] w-full items-center justify-between mb-1 py-1 px-2 border bg-[#ffffff] border-[#63492a] shadow-2xs"> 
        <div v-if="!expanded" class="flex w-full justify-start items-center px-5 py-1">
            <div class="bg-[#c41a1a] flex items-center justify-center rounded-[10px] py-0.5 px-2 mr-2">
                <label class="text-[#ffffff] font-bold">
                    {{ props.index }}
                </label>
            </div>

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

            <p class="flex-1 text-end font-bold text-[#2630bb] text-base">
                {{ cantidadInventario }} en inventario
            </p>
        </div>

        <div class="flex w-full py-1.5 rounded-[10px]"
        :class="expanded ? 'flex-col bg-[#ffffff]' : 'justify-between bg-[#e4e4e4] px-5'">
            <template v-if="!expanded">
                <label class="font-bold text-sm px-5 text-[#ffffff] rounded-[10px]"
                :class="getForeignValues(props.item, 'tipo') === 'niño' ? 'bg-[#3bb937]' : getForeignValues(props.item, 'tipo') === 'hombre' ? 'bg-[#2630bb]' : 'bg-[#c41a1a]'">
                    {{ getForeignValues(props.item, 'tipo') }} 
                </label>

                <button class="font-bold text-sm cursor-pointer hover:underline" 
                @click="expanded = true"> 
                    Mostrar detalles
                </button>
            </template>

            <template v-else-if="expanded">
                <div class="grid grid-cols-3 pl-12 pb-2 relative border-b-2 border-[#63492a]">
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

                <div class="bg-[#e4e4e4] rounded-[10px] flex justify-between items-center px-5 py-2 mt-2">
                    <div class="flex">
                        <label class="font-bold text-base text-[#c41a1a]">
                        Cantidad en inventario: {{ cantidadInventario }}
                    </label>

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
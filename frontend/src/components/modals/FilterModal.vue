<script setup lang="ts">
import { reactive, watch } from 'vue';

const props = defineProps<{
    text: string
    data: Record<string, any>
    show: boolean
}>()

const emits = defineEmits([
    'close',
    'confirm'
])

const selectedValues = reactive<Record<string, any>>({});

watch(() => props.show, (isShowing) => {
    if (isShowing && props.data) {
        Object.keys(props.data).forEach(key => {
            if (selectedValues[key] === undefined) {
                selectedValues[key] = '';
            }
        });
    }
}, { immediate: true })

watch(() => selectedValues['tipos_prenda'], (nuevoValor, valorAnterior) => {
    if (valorAnterior !== undefined && nuevoValor !== valorAnterior) {
        selectedValues['piezas_prenda'] = ''; 
    }
});

const getOptions = (filter: any, key: string | number) => {
    if (key === 'piezas_prenda' && selectedValues['tipos_prenda']) {
        return filter.options.filter((opt: any) => opt.parent_id == selectedValues['tipos_prenda']);
    }
    
    return filter.options || [];
}

const applyFilters = () => {
    const cleanFilters: Record<string, any> = {}

    Object.keys(selectedValues).forEach(key => {
        if(selectedValues[key] !== '') {
            cleanFilters[key] = selectedValues[key]
        }
    })

    emits('confirm', cleanFilters);
}

const clearFilters = () => {
    Object.keys(selectedValues).forEach(key => selectedValues[key] = '');
    emits('confirm', []); 
}
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-60 flex items-center justify-center" 
    @click="emits('close')">
        
        <div @click.stop class="flex flex-col justify-center w-full max-w-[30vw] bg-[#ffffff] rounded-[15px] p-5 shadow-2xl">
            <h1 class="text-xl w-full text-center font-bold text-[#000000] pb-2 border-[#63492a] border-b-2 mb-2">
                {{ text }}
            </h1>

            <div v-for="(filter, key) in data" :key="key" class="flex flex-col justify-center py-2 border-[#63492a]">
                <div class="flex items-center justify-between px-1">
                    <label class="text-[#000000] font-bold text-lg mb-1">
                        {{ filter.label }}
                    </label>
                </div>

                <input v-if="filter.type && filter.type === 'date'"
                type="date" v-model="selectedValues[key]"
                class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] focus:outline-none focus:ring-2 focus:ring-[#c41a1a]/50"
                />

                <select v-else v-model="selectedValues[key]"
                class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] focus:outline-none focus:ring-2 focus:ring-[#c41a1a]/50">
                    <option value="">Todos</option> 
                    
                    <option v-for="o in getOptions(filter, key)" :key="o.value" :value="o.value">
                        {{ o.label }}
                    </option>
                </select>
            </div>

            <div class="mt-4 flex items-center justify-between pt-4 border-[#63492a] border-t-2 gap-2">
                <button class="w-full rounded-[5px] font-bold text-base text-[#000000] py-2 bg-[#e4e4e4] cursor-pointer hover:scale-102 transition-transform duration-300 ease-out"
                @click="clearFilters()">
                    Limpiar
                </button>

                <button class="w-full rounded-[5px] font-bold text-base text-[#ffffff] py-2 bg-[#c41a1a] cursor-pointer hover:scale-102 transition-transform duration-300 ease-out"
                @click="emits('close')">
                    Cancelar
                </button>

                <button class="w-full rounded-[5px] font-bold text-base text-[#ffffff] py-2 bg-[#3bb937] cursor-pointer hover:scale-102 transition-transform duration-300 ease-out"
                @click="applyFilters()">
                    Aplicar
                </button>
            </div>
        </div>
    </div>
</template>
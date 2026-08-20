<script setup lang="ts">
import { ref, watch } from 'vue';

const props = defineProps<{
    show: boolean
    text: string
    data: any
}>()
console.log('data: ', props.data)

const emits = defineEmits([
    'confirm',
    'close'
])

interface SelectedFilter {
    order: number;
    selectedId: number | string | null;
}

const selectedsIds = ref<SelectedFilter[]>([])

const filteredOptions = (item: any) => {
    if(item.order === 1) {
        return item.options
    }

    const parentSelected = selectedsIds.value[item.order - 2]?.selectedId

    if(!parentSelected) return []

    return item.options.filter((o: any) => o.parent_id === parentSelected)
}

watch(() => props.show, (isShowing) => {
    if(isShowing && props.data) {
        selectedsIds.value = []
        
        Object.values(props.data).forEach((item: any) => { 
            if(item.order) {
                selectedsIds.value[item.order - 1] = {
                    order: item.order,
                    selectedId: null
                }
            }
        })
    }
}, { immediate: true })

const clearSelecteds = (currentIndex: number) => {
    for(let i = currentIndex + 1; i < selectedsIds.value.length; i++) {
        const itemActual = selectedsIds.value[i]

        if(itemActual) {
            itemActual.selectedId = null
        }
    }
}

const closeModal = () => {
    emits('close')
}

const sendData = () => {
    const validSelections = selectedsIds.value.filter(s => s.selectedId !== null)

    if(validSelections.length > 0) {
        emits('confirm', validSelections)
    } else {
        emits('close') 
    }
}
//console.log('data: ', props.data)
</script>

<template>
    <div v-if="show" class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="emits('close')">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[50vw] max-h-[50vh] bg-[#ffffff] rounded-[15px] p-5">
            <h1 class="text-xl w-full text-center font-bold text-[#000000] pb-2 border-[#63492a] border-b-2">
                {{text}}
            </h1>

            <div v-for="item in props.data" class="flex flex-col justify-center py-2 border-[#63492a]"> 
                <div class="flex items-center justify-between px-2">
                    <label class="text-[#000000] font-bold text-lg mb-1">
                        {{ item.label }} <span class="text-[#c41a1a]">*</span>
                    </label>
                </div>

                <select 
                v-if="selectedsIds[item.order - 1]"
                v-model="selectedsIds[item.order - 1]!.selectedId"
                @change="clearSelecteds(item.order - 1)"
                :disabled="item.order > 1 && !selectedsIds[item.order - 2]?.selectedId"
                class="bg-[#FFFFFF] py-3 px-5 rounded-[5px] font-bold text-[#000000] border border-[#63492a] 
                disabled:cursor-not-allowed disabled:text-[#000000]/50 disabled:bg-[#e0e0e0]">
                    <option :value="null" disabled>Seleccione una opción</option>
                    <option v-for="o in filteredOptions(item)" :key="o.value" :value="o.value">
                        {{ o.label }}
                    </option>
                </select>
            </div>

            <div class="mt flex items-center justify-between pt-2 border-[#63492a] border-t-2">
                <button class="w-full mr-1 rounded-[5px] font-bold text-lg text-[#ffffff] py-3 bg-[#c41a1a] cursor-pointer hover:scale-102"
                @click="closeModal()">
                    Cerrar
                </button>

                <button class="w-full ml-1 rounded-[5px] font-bold text-lg text-[#ffffff] py-3 bg-[#3bb937] cursor-pointer hover:scale-102"
                @click="sendData()">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</template>
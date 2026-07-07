<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { tiposPrendasInputs } from '@/data/tiposPrendasInputs';
import { tiposPrendasColumns } from '@/data/tiposPrendasColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';

const tiposPrenda = ref()
const selectedTipoPrenda = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)

const getTiposPrenda = async() => { 
    const {isFetching, error, data} = await useApi('tipos-prenda').json()

    if(data.value) {
        tiposPrenda.value = data.value
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const storeTipoPrenda = async(formData: any) => {
    isModalOpened.value = false
    selectedTipoPrenda.value = null

    if(formData.id) {
        const {data, error} = await useApi(`tipos-prenda/${formData.id}`).put(
            {
                nombre: formData.nombre
            }
        ).json()

        if(data.value) {
            await getTiposPrenda()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('tipos-prenda').post(
            {
                nombre: formData.nombre
            }
        ).json()

        if(data.value) {
            await getTiposPrenda()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deleteTipoPrenda = async(id: number) => {
    const {data, error} = await useApi(`tipos-prenda/${id}`).delete().json()

    if(data.value) {
        await getTiposPrenda()
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getTiposPrenda()
})

const openModal = (selected?: any) => {
    if(selected) selectedTipoPrenda.value = selected
    else selectedTipoPrenda.value = null
    isModalOpened.value = true
}
</script>

<template>
    <GenericModal 
    v-if="isModalOpened"
    :header="selectedTipoPrenda ? 'Editar tipo de prenda' : 'Agregar tipo de prenda'" 
    :inputs="tiposPrendasInputs" 
    :show="isModalOpened" 
    :model-value="selectedTipoPrenda"
    @close="isModalOpened = false"
    @accept="(formData) => storeTipoPrenda(formData)"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle 
                name="Tipos de prendas"
                @store="openModal()"/>
            </SubPageToogle>

            <div v-if="!tiposPrenda || !tiposPrenda.data || tiposPrenda.data.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                    <ItemCard v-for="f in tiposPrenda.data"
                    :grids="3"
                    :item="f"
                    :index=itemsIndex + 1
                    :columns="tiposPrendasColumns"
                    :show="true"
                    @update="openModal(f)"
                    @delete="deleteTipoPrenda(f.id)"
                    />
            </div>
        </template>
    </GenericContainer>
</template>
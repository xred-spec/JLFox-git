<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { procesosInputs } from '@/data/procesosInputs';
import { procesosColumns } from '@/data/procesosColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';

const procesos = ref()
const selectedProceso = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)

const getProcesos = async() => { 
    const {isFetching, error, data} = await useApi('procesos').json()

    if(data.value) {
        procesos.value = data.value
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const storeProceso = async(formData: any) => {
    isModalOpened.value = false
    selectedProceso.value = null

    if(formData.id) {
        const {data, error} = await useApi(`procesos/${formData.id}`).put(
            {
                nombre: formData.nombre
            }
        ).json()

        if(data.value) {
            await getProcesos()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('procesos').post(
            {
                nombre: formData.nombre
            }
        ).json()

        if(data.value) {
            await getProcesos()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deleteProceso = async(id: number) => {
    const {data, error} = await useApi(`procesos/${id}`).delete().json()

    if(data.value) {
        await getProcesos()
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getProcesos()
})

const openModal = (selected?: any) => {
    if(selected) selectedProceso.value = selected
    else selectedProceso.value = null
    isModalOpened.value = true
}
</script>

<template>
    <GenericModal 
    v-if="isModalOpened"
    :header="selectedProceso ? 'Editar proceso' : 'Agregar proceso'" 
    :inputs="procesosInputs" 
    :show="isModalOpened" 
    :model-value="selectedProceso"
    @close="isModalOpened = false"
    @accept="(formData) => storeProceso(formData)"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle 
                name="Procesos"
                @store="openModal()"/>
            </SubPageToogle>

            <div v-if="!procesos || !procesos.data || procesos.data.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                    <ItemCard v-for="f in procesos.data"
                    :grids="3"
                    :item="f"
                    :index=itemsIndex + 1
                    :columns="procesosColumns"
                    :show="true"
                    @update="openModal(f)"
                    @delete="deleteProceso(f.id)"
                    />
            </div>
        </template>
    </GenericContainer>
</template>
<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { coloresHiloInputs } from '@/data/coloresHiloInputs';
import { coloresHiloColumns } from '@/data/coloresHiloColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';

const coloresHilo = ref()
const selectedColorHilo = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)

const getColoresHilo = async() => { 
    const {isFetching, error, data} = await useApi('colores-hilo').json()

    if(data.value) {
        coloresHilo.value = data.value
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const storeColorHilo = async(formData: any) => {
    isModalOpened.value = false
    selectedColorHilo.value = null

    if(formData.id) {
        const {data, error} = await useApi(`colores-hilo/${formData.id}`).put(
            {
                color: formData.color
            }
        ).json()

        if(data.value) {
            await getColoresHilo()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('colores-hilo').post(
            {
                color: formData.color
            }
        ).json()

        if(data.value) {
            await getColoresHilo()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deleteForro = async(id: number) => {
    const {data, error} = await useApi(`colores-hilo/${id}`).delete().json()

    if(data.value) {
        await getColoresHilo()
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getColoresHilo()
})

const openModal = (selected?: any) => {
    if(selected) selectedColorHilo.value = selected
    else selectedColorHilo.value = null
    isModalOpened.value = true
}
</script>

<template>
    <GenericModal 
    v-if="isModalOpened"
    :header="selectedColorHilo ? 'Editar color de hilo' : 'Agregar color de hilo'" 
    :inputs="coloresHiloInputs" 
    :show="isModalOpened" 
    :model-value="selectedColorHilo"
    @close="isModalOpened = false"
    @accept="(formData) => storeColorHilo(formData)"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle 
                name="Colores de hilo"
                @store="openModal()"/>
            </SubPageToogle>

            <div v-if="!coloresHilo || !coloresHilo.data || coloresHilo.data.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                    <ItemCard v-for="f in coloresHilo.data"
                    :item="f"
                    :index=itemsIndex + 1
                    :columns="coloresHiloColumns"
                    :show="true"
                    @update="openModal(f)"
                    @delete="deleteForro(f.id)"
                    />
            </div>
        </template>
    </GenericContainer>
</template>
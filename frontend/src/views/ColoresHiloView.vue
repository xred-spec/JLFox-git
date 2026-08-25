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
import Pagination from '@/components/Pagination.vue';
import Loader from '@/components/Loader.vue';

const coloresHilo = ref()
const selectedColorHilo = ref(null)
const errorMessage = ref(null)

const isModalOpened = ref(false)

const currentPage = ref(1)
const lastPage = ref(1)
const disabledPagination = ref(false)
const loaderState = ref<string | null>('loading')

const getColoresHilo = async(page: number) => { 
    loaderState.value = 'loading'
    const {error, data} = await useApi('colores-hilo').json()

    if(data.value) {
        coloresHilo.value = data.value
        currentPage.value = page
        lastPage.value = coloresHilo.value.meta.last_page
        disabledPagination.value = false
        loaderState.value = 'success'

        setTimeout(() => {
            loaderState.value = null;
        }, 500);
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)

        loaderState.value = 'error'

        setTimeout(() => {
            loaderState.value = null;
        }, 500);
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
            await getColoresHilo(currentPage.value)
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
            await getColoresHilo(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deleteColorHilo = async(id: number) => {
    const {data, error} = await useApi(`colores-hilo/${id}`).delete().json()

    if(data.value) {
        await getColoresHilo(currentPage.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getColoresHilo(currentPage.value)
})

const openModal = (selected?: any) => {
    if(selected) selectedColorHilo.value = selected
    else selectedColorHilo.value = null
    isModalOpened.value = true
}

const changePage = (page: number) => {
    if(page > lastPage.value || page < 1) return
    disabledPagination.value = true
    getColoresHilo(page)
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
        <template #header>
            <SubPageToogle>
                <PageTitle 
                name="Colores de hilo"
                :hide-filter="true"
                :hide-store="false"
                :is-loading="loaderState ? true : false"
                @store="openModal()"/>
            </SubPageToogle>
        </template>

        <template #content>
            <Transition name="fade-content" mode="out-in">
                <div v-if="loaderState" class="w-full h-full flex justify-center items-center">
                    <Loader :state="loaderState" />
                </div>

                <div v-else-if="!coloresHilo || !coloresHilo.data || coloresHilo.data.length === 0" 
                class="flex flex-col size-full justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                    <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
                </div>

                <div v-else
                class="flex flex-col size-full justify-start items-center">
                    <ItemCard v-for="(c, i) in coloresHilo.data"
                    :grids="3"
                    :item="c"
                    :index="(15 * (currentPage - 1) + (Number(i) + 1))" 
                    :columns="coloresHiloColumns"
                    :show="true"
                    @update="openModal(c)"
                    @delete="deleteColorHilo(c.id)"
                    />
                </div>
            </Transition>
        </template>

        <template #pagination>
            <Pagination 
            :current-page="currentPage"
            :last-page="lastPage"
            :disabled="disabledPagination"
            @change-page="changePage"
            />
        </template>
    </GenericContainer>
</template>

<style scoped>
.fade-content-enter-active, .fade-content-leave-active {
    transition: opacity 0.2s ease;
}

.fade-content-enter-from, .fade-content-leave-to {
    opacity: 0;
}
</style>
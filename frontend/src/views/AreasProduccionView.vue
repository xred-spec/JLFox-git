<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { areasInputs } from '@/data/areasInputs';
import { areasColumns } from '@/data/areasColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';
import Pagination from '@/components/Pagination.vue';
import Loader from '@/components/Loader.vue';

const areas = ref()
const selectedTipoTela = ref(null)
const errorMessage = ref(null)

const isModalOpened = ref(false)

const currentPage = ref(1)
const lastPage = ref(1)
const disabledPagination = ref(false)
const loaderState = ref<string | null>('loading')

const getAreas = async(page: number) => { 
    loaderState.value = 'loading'
    const {error, data} = await useApi(`areas?page=${page}`).json()

    if(data.value) {
        areas.value = data.value
        currentPage.value = page
        lastPage.value = areas.value.meta.last_page
        disabledPagination.value = false
        loaderState.value = 'success'

        setTimeout(() => {
            loaderState.value = null
        }, 500)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)

        loaderState.value = 'error'

        setTimeout(() => {
            loaderState.value = null
        }, 500)
        return
    }
}

const storeArea = async(formData: any) => {
    isModalOpened.value = false
    selectedTipoTela.value = null

    if(formData.id) {
        const {data, error} = await useApi(`areas/${formData.id}`).put(
            {
                nombre: formData.nombre
            }
        ).json()

        if(data.value) {
            await getAreas(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('areas').post(
            {
                nombre: formData.nombre
            }
        ).json()

        if(data.value) {
            await getAreas(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deleteArea = async(id: number) => {
    const {data, error} = await useApi(`areas/${id}`).delete().json()

    if(data.value) {
        await getAreas(currentPage.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getAreas(currentPage.value)
})

const openModal = (selected?: any) => {
    if(selected) selectedTipoTela.value = selected
    else selectedTipoTela.value = null
    isModalOpened.value = true
}

const changePage = (page: number) => {
    if(page > lastPage.value || page < 1) return
    disabledPagination.value = true
    getAreas(page)
}
</script>

<template>
    <GenericModal 
    v-if="isModalOpened"
    :header="selectedTipoTela ? 'Editar área' : 'Agregar área'" 
    :inputs="areasInputs" 
    :show="isModalOpened" 
    :model-value="selectedTipoTela"
    @close="isModalOpened = false"
    @accept="(formData) => storeArea(formData)"
    />

    <GenericContainer>
        <template #header>
            <SubPageToogle>
                <PageTitle 
                name="Areas de producción"
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

                <div v-else-if="!areas || !areas.data || areas.data.length === 0" 
                class="flex flex-col size-full justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                    <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
                </div>

                <div v-else
                class="flex flex-col size-full justify-start items-center">
                        <ItemCard v-for="(a, i) in areas.data"
                        :grids="3"
                        :item="a"
                        :index="(15 * (currentPage - 1) + (Number(i) + 1))"
                        :columns="areasColumns"
                        :show="true"
                        @update="openModal(a)"
                        @delete="deleteArea(a.id)"
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
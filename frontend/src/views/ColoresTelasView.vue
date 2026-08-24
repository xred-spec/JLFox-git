<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted, watch } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { coloresTelaInputs } from '@/data/coloresTelaInputs';
import { coloresTelaColumns } from '@/data/coloresTelaColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';
import Pagination from '@/components/Pagination.vue';
import Loader from '@/components/Loader.vue';

const formInputs = ref([...coloresTelaInputs]) 

const coloresTela = ref()
const selectedColorTela = ref(null)
const errorMessage = ref(null)

const isModalOpened = ref(false)

const currentPage = ref(1)
const lastPage = ref(1)
const disabledPagination = ref(false)
const loaderState = ref<string | null>('loading')

const getColoresTela = async(page: number) => {
    loaderState.value = 'loading'
    const {error, data} = await useApi(`colores-tela?page=${page}`).json()

    if(data.value) {
        coloresTela.value = data.value
        currentPage.value = page
        lastPage.value = coloresTela.value.meta.last_page
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

const fetchSelects = async() => {
    const coloresTela = await useApi('tipos-tela/all').json()
    const inputColoresTela = formInputs.value.find(i => i.modelKey === 'tela_id')

    if(inputColoresTela && coloresTela.data.value) {
        inputColoresTela.options = coloresTela.data.value.data.map((tipoTela: any) => ({
            label: tipoTela.nombre,
            value: tipoTela.id
        }))
    }
}

const storeColorTela = async(formData: any) => {
    isModalOpened.value = false
    selectedColorTela.value = null

    if(formData.id) {
        const {data, error} = await useApi(`colores-tela/${formData.id}`).put(
            {
                color: formData.color,
                tela_id: formData.tela_id
            }
        ).json()

        if(data.value) {
            await getColoresTela(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('colores-tela').post(
            {
                color: formData.color,
                tela_id: formData.tela_id
            }
        ).json()

        if(data.value) {
            await getColoresTela(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deleteColorTela = async(id: number) => {
    const {data, error} = await useApi(`colores-tela/${id}`).delete().json()

    if(data.value) {
        await getColoresTela(currentPage.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getColoresTela(currentPage.value)
    await fetchSelects()
})

const openModal = (selected?: any) => {
    if(selected) selectedColorTela.value = selected
    else selectedColorTela.value = null
    isModalOpened.value = true
}

const changePage = (page: number) => {
    if(page > lastPage.value || page < 1) return
    disabledPagination.value = true
    getColoresTela(page)
}
</script>

<template>
    <GenericModal 
    v-if="isModalOpened"
    :header="selectedColorTela ? 'Editar color de tela' : 'Agregar color de tela'" 
    :inputs="formInputs" 
    :show="isModalOpened" 
    :model-value="selectedColorTela"
    @close="isModalOpened = false"
    @accept="(formData) => storeColorTela(formData)"
    />

    <GenericContainer>
        <template #header>
            <SubPageToogle>
                <PageTitle 
                :name="'Colores de tela'"
                :hide-store="false"
                :hide-filter="false"
                :is-loading="loaderState ? true : false"
                @store="openModal()"/>
            </SubPageToogle>
        </template>

        <template #content>
            <Transition name="fade-content" mode="out-in">
                <div v-if="loaderState" class="w-full h-full flex justify-center items-center">
                    <Loader :state="loaderState" />
                </div>
                
                <div v-else-if="!coloresTela || !coloresTela.data || coloresTela.data.length === 0" 
                class="flex flex-col size-full justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                    <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
                </div>

                <div v-else>
                    <ItemCard v-for="(c, i) in coloresTela.data"
                    :grids="4"
                    :item="c"
                    :index="(15 * (currentPage - 1) + (Number(i) + 1))"
                    :columns="coloresTelaColumns"
                    :show="true"
                    @update="openModal(c)"
                    @delete="deleteColorTela(c.id)"
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
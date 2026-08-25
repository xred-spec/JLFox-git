<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import PageTitle from '@/components/PageTitle.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import GenericContainer from '@/components/GenericContainer.vue';
import { prendasProcesosColumns } from '@/data/prendasProcesosColumns';
import InventarioItemCard from '@/components/InventarioItemCard.vue';
import Pagination from '@/components/Pagination.vue';
import Loader from '@/components/Loader.vue';

const prendasInventario = ref()
const errorMessage = ref(null)

const currentPage = ref(1)
const lastPage = ref(1)
const disabledPagination = ref(false)
const loaderState = ref<string | null>('loading')

const getPrendasInventario = async(page: number) => { 
    loaderState.value = 'loading'
    const {error, data} = await useApi(`prendas-procesos/procesos?page=${page}`).json()

    if(data.value) {
        prendasInventario.value = data.value
        currentPage.value = page
        lastPage.value = prendasInventario.value.meta.last_page
        disabledPagination.value = false
        loaderState.value = 'success'
        console.log('aqui')
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

onMounted (async() => {
    await getPrendasInventario(currentPage.value)
})

const changePage = (page: number) => {
    if(page > lastPage.value || page < 1) return
    disabledPagination.value = true
    getPrendasInventario(page)
}
</script>

<template>
    <GenericContainer>
        <template #header>
            <SubPageToogle>
                <PageTitle 
                :hide-store="true"
                :hide-filter="true"
                :is-loading="loaderState ? true : false"
                name="Inventario"
                />
            </SubPageToogle>
        </template>

        <template #content>
            <Transition name="fade-content" mode="out-in">
                <div v-if="loaderState" class="w-full h-full flex justify-center items-center">
                    <Loader :state="loaderState" />
                </div>

                <div v-else-if="!prendasInventario || !prendasInventario.data || prendasInventario.data.length === 0" 
                class="flex flex-col size-full justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                    <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
                </div>

                <div v-else
                class="flex flex-col size-full justify-start items-center">
                    <InventarioItemCard v-for="(inv, i) in prendasInventario.data"
                    :item="inv"
                    :index="(15 * (currentPage - 1) + (Number(i) + 1))"
                    :columns="prendasProcesosColumns"
                    :show="true"
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
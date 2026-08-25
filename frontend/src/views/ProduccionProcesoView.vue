<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { lotesColumns } from '@/data/lotesColumns';
import { lotesInputs } from '@/data/lotesInputs';
import LotesModal from '@/components/modals/LotesModal.vue';
import LoteItemCard from '@/components/LoteItemCard.vue';
import Pagination from '@/components/Pagination.vue';
import Loader from '@/components/Loader.vue';

const formInputs = ref([...lotesInputs]) 

const prendasOptions = ref<{label: string, value: any}[]>([])
const lotesProceso = ref()
const selectedLote = ref(null)
const errorMessage = ref(null)

const isModalOpened = ref(false)

const currentPage = ref(1)
const lastPage = ref(1)
const disabledPagination = ref(false)
const loaderState = ref<string | null>('loading')

const getLotes = async(page: number) => {
    loaderState.value = 'loading'
    const {isFetching, error, data} = await useApi('lotes/produccion').json()

    if(data.value) {
        lotesProceso.value = data.value
        currentPage.value = page
        lastPage.value = lotesProceso.value.meta.last_page
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
            loaderState.value = null;
        }, 500);
        return
    }
}

const fetchSelects = async() => {
    const prendas = await useApi('prendas/all').json()

    if(prendas.data.value) {
        prendasOptions.value = prendas.data.value.data.map((prenda: any) => ({
            label: `${prenda.tipo_prenda.nombre} ${prenda.color_tela.color}, Talla: ${prenda.talla} - 
            Bordado: ${prenda.bordado?.forma || 'Sin bordado'} - 
            Forro: ${prenda.forro?.color || 'Sin forro'} - 
            Cartera: ${prenda.tiene_cartera ? 'Con cartera' : 'Sin cartera'}`,
            value: prenda.id
        }))
    }
}

const storeLote = async(formData: any) => {
    isModalOpened.value = false
    selectedLote.value = null

    if(formData.id) {
        const {data, error} = await useApi(`lotes/${formData.id}`).put(
            {
                estado: formData.estado,
                fecha_inicio: formData.fecha_inicio,
                fecha_final: formData.fecha_final,
                prendas: formData.prendas
            }
        ).json()

        if(data.value) {
            await getLotes(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('lotes').post(
            {
                estado: formData.estado,
                fecha_inicio: formData.fecha_inicio,
                fecha_final: formData.fecha_final,
                prendas: formData.prendas
            }
        ).json()

        if(data.value) {
            await getLotes(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deleteLote = async(id: number) => {
    const {data, error} = await useApi(`lotes/${id}`).delete().json()

    if(data.value) {
        await getLotes(currentPage.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await fetchSelects()
    await getLotes(currentPage.value)
})

const openModal = (selected?: any) => {
    if(selected) selectedLote.value = selected
    else selectedLote.value = null
    isModalOpened.value = true
}

const changePage = (page: number) => {
    if(page > lastPage.value || page < 1) return
    disabledPagination.value = true
    getLotes(page)
}
</script>

<template>
    <LotesModal 
    v-if="isModalOpened"
    :header="selectedLote ? 'Editar lote' : 'Agregar lote'" 
    :inputs="formInputs" 
    :prendas="prendasOptions"
    :show="isModalOpened" 
    :model-value="selectedLote"
    @close="isModalOpened = false"
    @accept="(formData) => storeLote(formData)"
    />

    <GenericContainer>
        <template #header>
            <SubPageToogle>
                <PageTitle 
                name="Lotes en producción"
                :hide-filter="false"
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

                <div v-else-if="!lotesProceso || !lotesProceso.data || lotesProceso.data.length === 0" 
                class="flex flex-col size-full justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                    <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
                </div>

                <div v-else
                class="flex flex-col size-full justify-start items-center">
                        <LoteItemCard v-for="(l, i) in lotesProceso.data"
                        :grids="5"
                        :item="l"
                        :index="(15 * (currentPage - 1) + (Number(i) + 1))"
                        :columns="lotesColumns"
                        :show="true"
                        @update="openModal(l)"
                        @delete="deleteLote(l.id)"
                        @get="getLotes(currentPage)"
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
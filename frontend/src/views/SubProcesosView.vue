<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted, computed } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { procesosInputs } from '@/data/procesosInputs';
import { procesosColumns } from '@/data/procesosColumns';
import ProcesosCRUDModal from '@/components/modals/ProcesosCRUDModal.vue';
import ProcesosItemCard from '@/components/ProcesosItemCard.vue';
import FilterModal from '@/components/modals/FilterModal.vue';
import Pagination from '@/components/Pagination.vue';
import Loader from '@/components/Loader.vue';

const tiposPrendaOriginales = ref<any[]>([]);
const formInputs = ref([... procesosInputs])

const procesos = ref()
const selectedProceso = ref(null)
const errorMessage = ref(null)

const isModalOpened = ref(false)

const currentPage = ref(1)
const lastPage = ref(1)
const disabledPagination = ref(false)
const loaderState = ref<string | null>('loading')

const activeFilters = ref<Record<string, any>>({})
const filterModalOpened = ref(false)
const filters = ref<Record<string, any>>({})

const getProcesos = async(page: number) => { 
    loaderState.value = 'loading'

    const params = new URLSearchParams({
        page: page.toString()
    })

    Object.keys(activeFilters.value).forEach(key => {
        if(activeFilters.value[key] !== null && activeFilters.value[key] !== '') {
            params.append(key, activeFilters.value[key].toString())
        }
    })

    const {error, data} = await useApi(`procesos?${params.toString()}`).json()

    if(data.value) {
        procesos.value = data.value
        currentPage.value = page
        lastPage.value = procesos.value?.meta?.last_page || 1
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
    const tiposPrenda = await useApi('tipos-prenda/all').json()
    const piezasPrenda = await useApi('piezas-prenda/all').json()
    const inputTiposPrenda = formInputs.value.find(i => i.modelKey === 'tipo_prenda_id')

    filters.value = {
        tipo_prenda_id: { label: 'Tipo de prenda', options: [] },
        pieza_prenda_id: { label: 'Pieza de prenda', options: [] },
    }

    if(tiposPrenda.data.value && inputTiposPrenda) {

        tiposPrendaOriginales.value = tiposPrenda.data.value.data;
        const opciones = tiposPrenda.data.value.data.map((tipoPrenda: any) => ({
            label: tipoPrenda.nombre,
            value: tipoPrenda.id,
            piezas: tipoPrenda.piezas
        }))

        inputTiposPrenda.options = opciones
        filters.value.tipo_prenda_id.options = opciones
    }

    if(piezasPrenda.data.value) {
        const opciones = piezasPrenda.data.value.data.map((pieza: any) => ({
            label: `${pieza.tipo_prenda.nombre} - ${pieza.nombre}`,
            value: pieza.id,
        }))

        filters.value.pieza_prenda_id.options = opciones
    }
}



const storeProceso = async(formData: any) => {
    isModalOpened.value = false
    selectedProceso.value = null

    if(formData.id) {
        const {data, error} = await useApi(`procesos/${formData.id}`).put(
            {
                clave: formData.clave,
                area: formData.area,
                descripcion: formData.descripcion,
                pieza_prenda_id: formData.pieza_prenda_id,
                tiempo_previsto_hora: formData.tiempo_previsto_hora,
                tiempo_previsto_minuto: formData.tiempo_previsto_minuto,
                tiempo_previsto_segundo: formData.tiempo_previsto_segundo,
            }
        ).json()

        if(data.value) {
            await getProcesos(currentPage.value)
            return
        }

        console.log(errorMessage.value)
        if(error.value) {
            errorMessage.value = error.value
            return
        }
    } else {
        const {data, error} = await useApi('procesos').post(
            {
                clave: formData.clave,
                area: formData.area,
                descripcion: formData.descripcion,
                pieza_prenda_id: formData.pieza_prenda_id,
                tiempo_previsto_hora: formData.tiempo_previsto_hora,
                tiempo_previsto_minuto: formData.tiempo_previsto_minuto,
                tiempo_previsto_segundo: formData.tiempo_previsto_segundo,
            }
        ).json()

        if(data.value) {
            await getProcesos(currentPage.value)
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
        await getProcesos(currentPage.value)
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
    await getProcesos(currentPage.value)
})

const openModal = (selected?: any) => {
    if(selected) selectedProceso.value = selected
    else selectedProceso.value = null
    isModalOpened.value = true
}

const changePage = (page: number) => {
    if(page > lastPage.value || page < 1) return
    disabledPagination.value = true
    getProcesos(page)
}

const filterRegisters = (filtersFromModal: Record<string, any>) => {
    activeFilters.value = filtersFromModal
    filterModalOpened.value = false

    currentPage.value = 1
    getProcesos(currentPage.value)
}
</script>

<template>
    <ProcesosCRUDModal 
    v-if="isModalOpened"
    :header="selectedProceso ? 'Editar proceso' : 'Agregar proceso'" 
    :inputs="procesosInputs" 
    :show="isModalOpened" 
    :model-value="selectedProceso"
    @close="isModalOpened = false"
    @accept="(formData) => storeProceso(formData)"
    />

    <FilterModal 
    :show="filterModalOpened"
    :text="'Filtrar procesos'"
    :data="filters"
    @confirm="(filterData) =>filterRegisters(filterData)"
    @close="filterModalOpened = false"
    />

    <GenericContainer>
        <template #header>
            <SubPageToogle>
                <PageTitle 
                name="Procesos"
                :hide-filter="false"
                :hide-store="false"
                :is-loading="loaderState ? true : false"
                @store="openModal()"
                @filter="filterModalOpened = true"/>
            </SubPageToogle>
        </template>

        <template #content>
            <Transition name="fade-content" mode="out-in">
                <div v-if="loaderState" class="w-full h-full flex justify-center items-center">
                    <Loader :state="loaderState" />
                </div>

                <div v-else-if="!procesos || !procesos.data || procesos.data.length === 0" 
                class="flex flex-col size-full justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                    <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
                </div>

                <div v-else
                class="flex flex-col size-full justify-start items-center">
                        <ProcesosItemCard v-for="(p, i) in procesos.data"
                        :item="p"
                        :index="(15 * (currentPage - 1) + (Number(i) + 1))"
                        :columns="procesosColumns"
                        :show="true"
                        @update="openModal(p)"
                        @delete="deleteProceso(p.id)"
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
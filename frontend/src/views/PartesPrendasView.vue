<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { piezasPrendasInputs } from '@/data/piezasPrendasInputs';
import { piezasPrendasColumns } from '@/data/piezasPrendasColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';
import Pagination from '@/components/Pagination.vue';
import Loader from '@/components/Loader.vue';
import FilterModal from '@/components/modals/FilterModal.vue';

const formInputs = ref([...piezasPrendasInputs]) 

const piezas = ref()
const selectedPieza = ref(null)
const errorMessage = ref(null)

const isModalOpened = ref(false)

const currentPage = ref(1)
const lastPage = ref(1)
const disabledPagination = ref(false)
const loaderState = ref<string | null>('loading')

const activeFilters = ref<Record<string, any>>({})
const filterModalOpened = ref(false)
const filters = ref<Record<string, any>>({})

const getPiezas = async(page: number) => { 
    loaderState.value = 'loading'

    const params = new URLSearchParams({
        page: page.toString()
    })

    Object.keys(activeFilters.value).forEach(key => {
        if(activeFilters.value[key] !== null && activeFilters.value[key] !== '') {
            params.append(key, activeFilters.value[key].toString())
        }
    })

    const {error, data} = await useApi(`piezas-prenda?${params.toString()}`).json()

    if(data.value) {
        piezas.value = data.value
        currentPage.value = page
        lastPage.value = piezas.value.meta.last_page
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

const fetchSelects = async() => {
    const tiposPrendas = await useApi('tipos-prenda/all').json()
    const inputTiposPrendas = formInputs.value.find(i => i.modelKey === 'tipo_prenda_id')

    filters.value = {
        tipo_prenda_id: { label: 'Tipo de prenda', options: []}
    }

    if(inputTiposPrendas && tiposPrendas.data.value) {
        const opciones = tiposPrendas.data.value.data.map((tipoPrenda: any) => ({
            label: tipoPrenda.nombre,
            value: tipoPrenda.id
        }))

        inputTiposPrendas.options = opciones
        filters.value.tipo_prenda_id.options = opciones
    }
}

const storePiezas = async(formData: any) => {
    isModalOpened.value = false
    selectedPieza.value = null

    if(formData.id) {
        const {data, error} = await useApi(`piezas-prenda/${formData.id}`).put(
            {
                nombre: formData.nombre,
                tipo_prenda_id: formData.tipo_prenda_id
            }
        ).json()

        if(data.value) {
            await getPiezas(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('piezas-prenda').post(
            {
                nombre: formData.nombre,
                tipo_prenda_id: formData.tipo_prenda_id
            }
        ).json()

        if(data.value) {
            await getPiezas(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deletePiezas = async(id: number) => {
    const {data, error} = await useApi(`piezas-prenda/${id}`).delete().json()

    if(data.value) {
        await getPiezas(currentPage.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getPiezas(currentPage.value)
    await fetchSelects()
})

const openModal = (selected?: any) => {
    if(selected) selectedPieza.value = selected
    else selectedPieza.value = null
    isModalOpened.value = true
}

const changePage = (page: number) => {
    if(page > lastPage.value || page < 1) return
    disabledPagination.value = true
    getPiezas(page)
}

const filterRegisters = (filtersFromModal: Record<string, any>) => {
    activeFilters.value = filtersFromModal
    filterModalOpened.value = false

    currentPage.value = 1
    getPiezas(currentPage.value)
}
</script>

<template>
    <GenericModal 
    v-if="isModalOpened"
    :header="selectedPieza ? 'Editar pieza de prenda' : 'Agregar pieza de prenda'" 
    :inputs="formInputs" 
    :show="isModalOpened" 
    :model-value="selectedPieza"
    @close="isModalOpened = false"
    @accept="(formData) => storePiezas(formData)"
    />

    <FilterModal 
    :show="filterModalOpened"
    :text="'Filtrar piezas de prendas'"
    :data="filters"
    @confirm="(filterData) =>filterRegisters(filterData)"
    @close="filterModalOpened = false"
    />

    <GenericContainer>
        <template #header>
            <SubPageToogle>
                <PageTitle 
                name="Piezas de prendas"
                :hide-filter="false"
                :hide-store="false"
                :is-loading="loaderState ? true : false"
                @store="openModal()"
                @filter="filterModalOpened = true"
                />
            </SubPageToogle>
        </template>

        <template #content>
            <Transition name="fade-content" mode="out-in">
                <div v-if="loaderState" class="w-full h-full flex justify-center items-center">
                    <Loader :state="loaderState" />
                </div>

                <div v-else-if="!piezas || !piezas.data || piezas.data.length === 0" 
                class="flex flex-col size-full justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                    <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
                </div>

                <div v-else
                class="flex flex-col size-full justify-start items-center">
                        <ItemCard v-for="(p, i) in piezas.data"
                        :grids="4"
                        :item="p"
                        :index="(15 * (currentPage - 1) + (Number(i) + 1))"
                        :columns="piezasPrendasColumns"
                        :show="true"
                        @update="openModal(p)"
                        @delete="deletePiezas(p.id)"
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
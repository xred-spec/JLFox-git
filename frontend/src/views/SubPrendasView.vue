<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted} from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { prendasInputs } from '@/data/prendasInputs'; 
import { prendasColumns } from '@/data/prendasColumns';
import PrendasModal from '@/components/modals/PrendasModal.vue';
import PrendasItemCard from '@/components/PrendasItemCard.vue';
import Pagination from '@/components/Pagination.vue';
import Loader from '@/components/Loader.vue';
import FilterModal from '@/components/modals/FilterModal.vue';

const formInputs = ref([...prendasInputs]) 

const prendas = ref()
const selectedPrenda = ref(null)
const errorMessage = ref(null)

const isModalOpened = ref(false)

const currentPage = ref(1)
const lastPage = ref(1)
const disabledPagination = ref(false)
const loaderState = ref<string | null>('loading')

const activeFilters = ref<Record<string, any>>({})
const filterModalOpened = ref(false)
const filters = ref<Record<string, any>>({})

const getPrendas = async(page: number) => {
    loaderState.value = 'loading'

    const params = new URLSearchParams({
        page: page.toString()
    })

    Object.keys(activeFilters.value).forEach(key => {
        if(activeFilters.value[key] !== null && activeFilters.value[key] !== '') {
            params.append(key, activeFilters.value[key].toString())
        }
    })

    const {error, data} = await useApi(`prendas?${params.toString()}`).json()

    if(data.value) {
        prendas.value = data.value
        currentPage.value = page
        lastPage.value = prendas.value.meta.last_page
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
    const tiposPrenda = await useApi('tipos-prenda/all').json()
    const coloresTela = await useApi('colores-tela/all').json()
    const bordados = await useApi('bordados/all').json()
    const forros = await useApi('forros/all').json()

    const inputTiposPrenda = formInputs.value.find(i => i.modelKey === 'tipo_prenda_id')
    const inputColoresTela = formInputs.value.find(i => i.modelKey === 'color_tela_id')
    const inputBordados = formInputs.value.find(i => i.modelKey === 'bordado_id')
    const inputForros = formInputs.value.find(i => i.modelKey === 'forro_id')

    filters.value = {
        tipo: { label: 'Tipo', options: [
            {label: 'Hombre', value: 'hombre'},
            {label: 'Mujer', value: 'mujer'},
            {label: 'Niño', value: 'niño'},
        ]},
        tipo_prenda_id: { label: 'Tipo de prenda', options: [] },
        color_tela_id: { label: 'Color de tela', options: [] },
        bordado_id: { label: 'Bordado', options: [] },
        forro_id: { label: 'Forro', options: [] },
    }

    //Tipos prendas
    if(inputTiposPrenda && tiposPrenda.data.value) {
        const opciones = tiposPrenda.data.value.data.map((tipoPrenda: any) => ({
            label: tipoPrenda.nombre,
            value: tipoPrenda.id
        }))

        inputTiposPrenda.options = opciones
        filters.value.tipo_prenda_id.options = opciones
    }

    //Colores tela
    if(inputColoresTela && coloresTela.data.value) {
        const opciones = coloresTela.data.value.data.map((colorTela: any) => ({
            label: `${colorTela.tela.nombre} - ${colorTela.color}`,
            value: colorTela.id
        }))

        inputColoresTela.options = opciones
        filters.value.color_tela_id.options = opciones
    }

    //Bordados
    if(inputBordados && bordados.data.value) {
        const opciones = bordados.data.value.data.map((bordado: any) => ({
            label: `${bordado.forma} - ${bordado.color_hilo.color}`,
            value: bordado.id
        }))

        inputBordados.options = opciones
        filters.value.bordado_id.options = opciones
    }

    //Forros
    if(inputForros && forros.data.value)
    {
        const opciones = forros.data.value.data.map((forro: any) => ({
            label: forro.color,
            value: forro.id
        }))

        inputForros.options = opciones
        filters.value.forro_id.options = opciones
    }
}

const storePrenda = async(formData: any) => {
    isModalOpened.value = false
    selectedPrenda.value = null

    if(formData.id) {
        const {data, error} = await useApi(`prendas/${formData.id}`).put(
            {
                tipo: formData.tipo,
                talla: formData.talla,
                tipo_prenda_id: formData.tipo_prenda_id,
                color_tela_id: formData.color_tela_id,
                bordado_id: formData.bordado_id,
                forro_id: formData.forro_id,
                tiene_cartera: formData.tiene_cartera,
                tiene_bordado: formData.tiene_bordado,
            }
        ).json()

        if(data.value) {
            await getPrendas(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('prendas').post(
            {
                tipo: formData.tipo,
                talla: formData.talla,
                tipo_prenda_id: formData.tipo_prenda_id,
                color_tela_id: formData.color_tela_id,
                bordado_id: formData.bordado_id,
                forro_id: formData.forro_id,
                tiene_cartera: formData.tiene_cartera,
                tiene_bordado: formData.tiene_bordado,
            }
        ).json()

        if(data.value) {
            await getPrendas(currentPage.value)
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deletePrenda = async(id: number) => {
    const {data, error} = await useApi(`prendas/${id}`).delete().json()

    if(data.value) {
        await getPrendas(currentPage.value)
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
    await getPrendas(currentPage.value)
})

const openModal = (selected?: any) => {
    if(selected) selectedPrenda.value = selected
    else selectedPrenda.value = null
    isModalOpened.value = true
}

const changePage = (page: number) => {
    if(page > lastPage.value || page < 1) return
    disabledPagination.value = true
    getPrendas(page)
}

const filterRegisters = (filtersFromModal: Record<string, any>) => {
    activeFilters.value = filtersFromModal
    filterModalOpened.value = false

    currentPage.value = 1
    getPrendas(currentPage.value)
}
</script>

<template>
    <PrendasModal 
    v-if="isModalOpened"
    :header="selectedPrenda ? 'Editar prenda' : 'Agregar prenda'" 
    :inputs="formInputs" 
    :show="isModalOpened" 
    :model-value="selectedPrenda"
    @close="isModalOpened = false"
    @accept="(formData) => storePrenda(formData)"
    />

    <FilterModal 
    :show="filterModalOpened"
    :text="'Filtrar prendas'"
    :data="filters"
    @confirm="(filterData) =>filterRegisters(filterData)"
    @close="filterModalOpened = false"
    />

    <GenericContainer>
        <template #header>
            <SubPageToogle>
                <PageTitle 
                name="Prendas"
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

                <div v-else-if="!prendas || !prendas.data || prendas.data.length === 0" 
                class="flex flex-col size-full justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                    <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
                </div>

                <div v-else
                class="flex flex-col size-full justify-start items-center">
                        <PrendasItemCard v-for="(p, i) in prendas.data"
                        :item="p"
                        :index="(15 * (currentPage - 1) + (Number(i) + 1))"
                        :columns="prendasColumns"
                        :show="true"
                        @update="openModal(p)"
                        @delete="deletePrenda(p.id)"
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
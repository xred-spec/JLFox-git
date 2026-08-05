<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted, watch, computed } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { procesosInputs } from '@/data/procesosInputs';
import { procesosColumns } from '@/data/procesosColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';
import FilterModal from '@/components/modals/FilterModal.vue';

const tiposPrendaOriginales = ref<any[]>([]);
const formInputs = ref([... procesosInputs])
const filters = ref()

const procesos = ref()
const selectedProceso = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)
const filterModalOpened = ref(false)

const activeFilters = ref<any[]>([]) 

const filterRegisters = (filtersFromModal: any) => {
    activeFilters.value = filtersFromModal;
    filterModalOpened.value = false; 
    //console.log('Filtros aplicados: ', activeFilters.value);
}

const getProcesos = async() => { 
    const {isFetching, error, data} = await useApi('procesos').json()

    if(data.value) {
        procesos.value = data.value
        console.log('procesos: ', procesos.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const fetchSelects = async() => {
    const tiposPrenda = await useApi('tipos-prenda').json()
    const inputTiposPrenda = formInputs.value.find(i => i.modelKey === 'tipo_prenda_id')

    if(tiposPrenda.data.value && inputTiposPrenda) {
        tiposPrendaOriginales.value = tiposPrenda.data.value.data;
        inputTiposPrenda.options = tiposPrenda.data.value.data.map((tipoPrenda: any) => ({
            label: tipoPrenda.nombre,
            value: tipoPrenda.id,
            piezas: tipoPrenda.piezas,
        }))
    }

    console.log('tiposPrenda: ', tiposPrenda.data.value)
    
    filters.value = {}
    filters.value.tipos_prenda = {label: 'Tipos de prendas', options: [], order: 1}
    filters.value.piezas_prenda = {label: 'Piezas de prenda', options: [], order: 2}
    
    tiposPrenda.data.value.data.forEach((tipo: any) => {
        filters.value.tipos_prenda.options.push({
            value: tipo.id,
            label: tipo.nombre,
        })

        tipo.piezas.forEach((pieza: any) => {
            filters.value.piezas_prenda.options.push({
                value: pieza.id,
                label: pieza.nombre,
                parent_id: pieza.tipo_prenda.id,
            })    
        })
    })

    //console.log('filters: ', filters.value)
}

const procesosFiltrados = computed(() => {
    console.log('activeFilters: ', activeFilters.value)
    if (!procesos.value || !procesos.value.data) return [];

    if (activeFilters.value.length === 0) return procesos.value.data;

    return procesos.value.data.filter((proceso: any) => {
        let coincide = true;

        activeFilters.value.forEach(filtro => {
            if (filtro.order === 1) {
                const tieneTipo = proceso.pieza_prenda_proceso?.some(
                    (ppp: any) => ppp.pieza_prenda?.tipo_prenda?.id == filtro.selectedId
                );
                
                if (!tieneTipo) coincide = false;
            }
            
            if (filtro.order === 2) {
                const tienePieza = proceso.pieza_prenda_proceso?.some(
                    (ppp: any) => ppp.pieza_prenda?.id == filtro.selectedId
                );

                if (!tienePieza) coincide = false;
            }
        });

        return coincide;
    });
});

const storeProceso = async(formData: any) => {
    isModalOpened.value = false
    selectedProceso.value = null

    if(formData.id) {
        const {data, error} = await useApi(`procesos/${formData.id}`).put(
            {
                clave: formData.clave,
                area: formData.area,
                descripcion: formData.descripcion,
                pieza_prenda_id: formData.pieza_prenda_id
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
                clave: formData.clave,
                area: formData.area,
                descripcion: formData.descripcion,
                pieza_prenda_id: formData.pieza_prenda_id
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
    await fetchSelects()
})

const openModal = (selected?: any) => {
    if(selected) selectedProceso.value = selected
    else selectedProceso.value = null
    isModalOpened.value = true
}

const openFilterModal = (selected?: any) => {
    if(selected) selectedProceso.value = selected
    else selectedProceso.value = null
    filterModalOpened.value = true
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

    <FilterModal 
    :show="filterModalOpened"
    :text="'Filtrar procesos'"
    :data="filters"
    @confirm="(filterData) => filterRegisters(filterData)"
    @close="filterModalOpened = false"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle 
                name="Procesos"
                @store="openModal()"
                @filter="openFilterModal()"/>
            </SubPageToogle>

            <div v-if="!procesosFiltrados || procesosFiltrados.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                    <ItemCard v-for="f in procesosFiltrados"
                    :grids="4"
                    :item="f"
                    :index=itemsIndex
                    :columns="procesosColumns"
                    :show="true"
                    @update="openModal(f)"
                    @delete="deleteProceso(f.id)"
                    />
            </div>
        </template>
    </GenericContainer>
</template>
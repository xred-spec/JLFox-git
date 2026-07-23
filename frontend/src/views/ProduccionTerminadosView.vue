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
import TerminadosModal from '@/components/modals/TerminadosModal.vue';

const formInputs = ref([...lotesInputs]) 

const prendasOptions = ref<{label: string, value: any}[]>([])
const lotesTerminados = ref()
const selectedLote = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)
const dataModalOpened = ref(false)

const getLotes = async() => {
    const {isFetching, error, data} = await useApi('lotes/terminados').json()

    if(data.value) {
        lotesTerminados.value = data.value
        //console.log('data', data.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const fetchSelects = async() => {
    const prendas = await useApi('prendas').json()

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
            await getLotes()
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
            await getLotes()
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
        await getLotes()
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
    await getLotes()
})

const openModal = (selected?: any) => {
    if(selected) selectedLote.value = selected
    else selectedLote.value = null
    isModalOpened.value = true
}

const openModalData = (selected?: any) => {
    if(selected) selectedLote.value = selected
    else selectedLote.value = null
    dataModalOpened.value = true
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

    <TerminadosModal 
    :show="dataModalOpened"
    :model-value="selectedLote"
    @close="dataModalOpened = false"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle 
                name="Bordados"
                @store="openModal()"/>
            </SubPageToogle>

            <div v-if="!lotesTerminados || !lotesTerminados.data || lotesTerminados.data.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                    <LoteItemCard v-for="l in lotesTerminados.data"
                    :grids="5"
                    :item="l"
                    :index="itemsIndex"
                    :columns="lotesColumns"
                    :show="true"
                    @data="openModalData(l)"
                    @update="openModal(l)"
                    @delete="deleteLote(l.id)"
                    />
            </div>
        </template>
    </GenericContainer>
</template>
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

const formInputs = ref([...piezasPrendasInputs]) 

const piezas = ref()
const selectedPieza = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)

const getPiezas = async() => { 
    const {isFetching, error, data} = await useApi('piezas-prenda').json()

    if(data.value) {
        piezas.value = data.value
        console.log('piezas: ', piezas.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const fetchSelects = async() => {
    const tiposPrendas = await useApi('tipos-prenda').json()
    const inputTiposPrendas = formInputs.value.find(i => i.modelKey === 'tipo_prenda_id')

    if(inputTiposPrendas && tiposPrendas.data.value) {
        inputTiposPrendas.options = tiposPrendas.data.value.data.map((tipoPrenda: any) => ({
            label: tipoPrenda.nombre,
            value: tipoPrenda.id
        }))
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
            await getPiezas()
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
            await getPiezas()
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
        await getPiezas()
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getPiezas()
    await fetchSelects()
})

const openModal = (selected?: any) => {
    if(selected) selectedPieza.value = selected
    else selectedPieza.value = null
    isModalOpened.value = true
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

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle 
                name="Piezas de prendas"
                @store="openModal()"/>
            </SubPageToogle>

            <div v-if="!piezas || !piezas.data || piezas.data.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                    <ItemCard v-for="f in piezas.data"
                    :grids="4"
                    :item="f"
                    :index=itemsIndex
                    :columns="piezasPrendasColumns"
                    :show="true"
                    @update="openModal(f)"
                    @delete="deletePiezas(f.id)"
                    />
            </div>
        </template>
    </GenericContainer>
</template>
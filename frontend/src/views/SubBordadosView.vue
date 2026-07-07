<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted, watch } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { bordadosInputs } from '@/data/bordadosInputs';
import { bordadosColumns } from '@/data/bordadosColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';

const formInputs = ref([...bordadosInputs]) 

const bordados = ref()
const selectedBordado = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)

const getBordados = async() => {
    const {isFetching, error, data} = await useApi('bordados').json()

    if(data.value) {
        bordados.value = data.value
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const fetchSelects = async() => {
    const coloresHilo = await useApi('colores-hilo').json()
    const inputColoresHilo = formInputs.value.find(i => i.modelKey === 'color_hilo_id')

    if(inputColoresHilo && coloresHilo.data.value) {
        inputColoresHilo.options = coloresHilo.data.value.data.map((colorHilo: any) => ({
            label: colorHilo.color,
            value: colorHilo.id
        }))
    }
}

const storeBordado = async(formData: any) => {
    isModalOpened.value = false
    selectedBordado.value = null

    if(formData.id) {
        const {data, error} = await useApi(`bordados/${formData.id}`).put(
            {
                forma: formData.forma,
                color_hilo_id: formData.color_hilo_id
            }
        ).json()

        if(data.value) {
            await getBordados()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('bordados').post(
            {
                forma: formData.forma,
                color_hilo_id: formData.color_hilo_id
            }
        ).json()

        if(data.value) {
            await getBordados()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deleteBordado = async(id: number) => {
    const {data, error} = await useApi(`bordados/${id}`).delete().json()

    if(data.value) {
        await getBordados()
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
    await getBordados()
})

const openModal = (selected?: any) => {
    if(selected) selectedBordado.value = selected
    else selectedBordado.value = null
    isModalOpened.value = true
}
</script>

<template>
    <GenericModal 
    v-if="isModalOpened"
    :header="selectedBordado ? 'Editar bordado' : 'Agregar bordado'" 
    :inputs="formInputs" 
    :show="isModalOpened" 
    :model-value="selectedBordado"
    @close="isModalOpened = false"
    @accept="(formData) => storeBordado(formData)"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle 
                name="Bordados"
                @store="openModal()"/>
            </SubPageToogle>

            <div v-if="!bordados || !bordados.data || bordados.data.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                    <ItemCard v-for="b in bordados.data"
                    :grids="4"
                    :item="b"
                    :index=itemsIndex + 1
                    :columns="bordadosColumns"
                    :show="true"
                    @update="openModal(b)"
                    @delete="deleteBordado(b.id)"
                    />
            </div>
        </template>
    </GenericContainer>
</template>
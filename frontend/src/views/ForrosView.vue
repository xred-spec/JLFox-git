<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { forrosInputs } from '@/data/forrosInputs';
import { forrosColumns } from '@/data/forrosColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import ItemCard from '@/components/ItemCard.vue';

const forros = ref()
const selectedForro = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)

const getForros = async() => { 
    const {isFetching, error, data} = await useApi('forros').json()

    if(data.value) {
        forros.value = data.value
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const storeForro = async(formData: any) => {
    isModalOpened.value = false
    selectedForro.value = null

    if(formData.id) {
        const {data, error} = await useApi(`forros/${formData.id}`).put(
            {
                color: formData.color
            }
        ).json()

        if(data.value) {
            forros.value = getForros()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('forros').post(
            {
                color: formData.color
            }
        ).json()

        if(data.value) {
            forros.value = getForros()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
    
    getForros()
}

const deleteForro = async(id: number) => {
    const {data, error} = await useApi(`forros/${id}`).delete().json()

    if(data.value) {
        forros.value = getForros()
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log(errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getForros()
})

const openModal = (selected?: any) => {
    if(selected) selectedForro.value = selected
    else selectedForro.value = null
    isModalOpened.value = true
}
</script>

<template>
    <GenericModal 
    v-if="isModalOpened"
    :header="selectedForro ? 'Editar forro' : 'Agregar forro'" 
    :inputs="forrosInputs" 
    :show="isModalOpened" 
    :model-value="selectedForro"
    @close="isModalOpened = false"
    @accept="(formData) => storeForro(formData)"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle 
                name="Forros"
                @store="openModal()"/>
            </SubPageToogle>

            <div v-if="!forros" 
            class="flex size-full justify-center items-center">
                <p class="font-bold text-center">No se encontraron registros</p>
            </div>

            <ItemCard v-else v-for="f in forros.data"
            :item="f"
            :index=itemsIndex + 1
            :columns="forrosColumns"
            :show="true"
            @update="openModal(f)"
            @delete="deleteForro(f.id)"
            />
        </template>
    </GenericContainer>
</template>
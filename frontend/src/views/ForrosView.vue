<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { forrosInputs } from '@/data/forrosInputs';
import { forrosColumns } from '@/data/forrosColumns';
import GenericModal from '@/components/modals/GenericModal.vue';
import { formatDate } from '@vueuse/core';

const forros = ref()
const selectedForro = ref(null)
const errorMessage = ref(null)

const modalOpened = ref(false)

const getForros = async() => { 
    const {isFetching, error, data} = await useApi('forros').json()

    if(data.value) {
        forros.value = data.value
        console.log('data: ', forros.value)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const storeForro = async(formData: any) => {
    modalOpened.value = false
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

onMounted (async() => {
    await getForros()
})
</script>

<template>
    <GenericModal :header="selectedForro ? 'Editar forro' : 'Agregar forro'" :inputs="forrosInputs" :show="modalOpened" :model-value="selectedForro"
    @close="modalOpened = false"
    @accept="(formData) => storeForro(formData)"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle name="Forros" add="forro" 
                @store="modalOpened = true"/>
            </SubPageToogle>

            
        </template>
    </GenericContainer>
</template>
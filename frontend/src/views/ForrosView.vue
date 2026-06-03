<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import PageTitle from '@/components/PageTitle.vue';
import { forrosInputs } from '@/data/forrosInputs';
import { forrosColumns } from '@/data/forrosColumns';

const forros = ref()
const selectedForro = ref(null)
const errorMessage = ref(null)

const getForros = async() => { 
    const {isFetching, error, data} = await useApi('forros').json()

    if(data.value) {
        forros.value = data.value
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        return
    }
}

onMounted (async() => {
    await getForros()
})

console.log('forros: ' + forros.value)
</script>

<template>
    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle name="Forros" />
            </SubPageToogle>

            <p v-if="!forros?.value">No se encontraron forros</p>
        </template>
    </GenericContainer>
</template>
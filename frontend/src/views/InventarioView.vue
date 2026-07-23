<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import PageTitle from '@/components/PageTitle.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
import GenericContainer from '@/components/GenericContainer.vue';
import { prendasProcesosColumns } from '@/data/prendasProcesosColumns';
import InventarioItemCard from '@/components/InventarioItemCard.vue';

const prendasInventario = ref()
const errorMessage = ref(null)
const itemsIndex = ref(0)

const getPrendasInventario = async() => { 
    const {isFetching, error, data} = await useApi('prendas-procesos/procesos').json()

    if(data.value) {
        prendasInventario.value = data.value
        console.log('data: ', prendasInventario.value.data)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

onMounted (async() => {
    await getPrendasInventario()
})
</script>

<template>
    <GenericContainer>
        <template #content>
            <SubPageToogle>
                <PageTitle :hide-button="true"
                name="Inventario"
                />
            </SubPageToogle>

            <div v-if="!prendasInventario || !prendasInventario.data || prendasInventario.data.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                <InventarioItemCard v-for="f in prendasInventario.data"
                :item="f"
                :index=itemsIndex + 1
                :columns="prendasProcesosColumns"
                :show="true"
                />
            </div>    
        </template>
    </GenericContainer>
</template>
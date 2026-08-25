<script setup lang="ts">
import { useApi } from '@/composables/useApi';
import { ref, onMounted } from 'vue';
import GenericContainer from '@/components/GenericContainer.vue';
import SubPageToogle from '@/components/SubPageToogle.vue';
//import PageTitle from '@/components/PageTitle.vue';
import { prendasProcesosColumns } from '@/data/prendasProcesosColumns';
import ProcesosModal from '@/components/modals/ProcesosModal.vue';
import PrendasProcesosItemCard from '@/components/PrendasProcesosItemCard.vue';
import { prendasProcesosInputs } from '@/data/prendasProcesosInputs';

const prendasProcesos = ref()
const procesos = ref()

const formInputs = ref([...prendasProcesosInputs]) 

const selectedPrendaProceso = ref(null)
const errorMessage = ref(null)
const itemsIndex = ref(0)

const isModalOpened = ref(false)

const getPrendasProcesos = async() => { 
    const {error, data} = await useApi('prendas-procesos/procesos').json()

    if(data.value) {
        prendasProcesos.value = data.value
        //console.log('data: ', prendasProcesos.value.data)
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }
}

const fetchSelects = async() => {
    const prendas = await useApi('prendas/all').json()
    const inputPrendas = formInputs.value.find(i => i.modelKey === 'prenda_id')

    if(prendas.data.value && inputPrendas) {
        inputPrendas.options = prendas.data.value.data.map((prenda: any) => ({
            label: `${prenda.tipo_prenda.nombre} ${prenda.color_tela.color}, Talla: ${prenda.talla} - 
            Bordado: ${prenda.bordado?.forma || 'Sin bordado'} - 
            Forro: ${prenda.forro?.color || 'Sin forro'} - 
            Cartera: ${prenda.tiene_cartera ? 'Con cartera' : 'Sin cartera'}`,
            value: prenda.id
        }))
    }

    const {error, data} = await useApi('procesos').json()

    if(data.value) {
        procesos.value = data.value
        return
    }

    if(error.value) {
        errorMessage.value = error.value
        console.log('error: ', errorMessage.value)
        return
    }    
}

const storePrendaProceso = async(formData: any) => {
    isModalOpened.value = false
    selectedPrendaProceso.value = null
    //console.log('formData: ', formData)

    if(formData.id) {
        const {data, error} = await useApi(`prendas-procesos`).post(
            {
                prenda_id: formData.prenda_id,
                procesos: formData.procesos
            }
        ).json()

        if(data.value) {
            await getPrendasProcesos()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } else {
        const {data, error} = await useApi('prendas-procesos').post(
            {
                prenda_id: formData.prenda_id,
                procesos: formData.procesos
            }
        ).json()

        if(data.value) {
            await getPrendasProcesos()
            return
        }

        if(error.value) {
            errorMessage.value = error.value
            console.log(errorMessage.value)
            return
        }
    } 
}

const deletePrendaProceso = async(id: number) => {
    const {data, error} = await useApi(`procesos/${id}`).delete().json()

    if(data.value) {
        await getPrendasProcesos()
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
    await getPrendasProcesos()
})

const openModal = (selected?: any) => {
    if(selected) selectedPrendaProceso.value = selected
    else selectedPrendaProceso.value = null
    //console.log('selected: ', selected)
    isModalOpened.value = true
}
</script>

<template>
    <ProcesosModal 
    v-if="isModalOpened"
    :header="selectedPrendaProceso ? 'Editar prenda-proceso' : 'Agregar prenda-proceso'" 
    :inputs="prendasProcesosInputs" 
    :labels="procesos.data"
    :show="isModalOpened" 
    :model-value="selectedPrendaProceso"
    @close="isModalOpened = false"
    @accept="(formData) => storePrendaProceso(formData)"
    />

    <GenericContainer>
        <template #content>
            <SubPageToogle>
            </SubPageToogle>

            <div v-if="!prendasProcesos || !prendasProcesos.data || prendasProcesos.data.length === 0" 
            class="flex flex-col size-full justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-x-icon lucide-circle-x size-10"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <p class="font-bold text-center">No se encontraron registros. Intente agregar uno.</p>
            </div>

            <div v-else
            class="flex flex-col size-full justify-start items-center">
                    <PrendasProcesosItemCard v-for="f in prendasProcesos.data"
                    :item="f"
                    :index=itemsIndex + 1
                    :columns="prendasProcesosColumns"
                    :show="true"
                    @update="openModal(f)"
                    @delete="deletePrendaProceso(f.id)"
                    />
            </div>
        </template>
    </GenericContainer>
</template>
<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import { useLocalStorage } from '@vueuse/core';
import SubPageToogle from '@/components/SubPageToogle.vue';
import SubPageButton from '@/components/SubPageButton.vue';
import GenericContainer from '@/components/GenericContainer.vue';

const router = useRouter()
const subPageName = ref('pendientes')
const selectedSubPage = useLocalStorage<string | null>('produccion', subPageName)

const toogleSubPage = (subPage: string) => {
    subPageName.value = subPage
    router.push({name: subPage})
}

onMounted(() => {
    toogleSubPage(subPageName.value)
}) 
</script>

<template>
    <GenericContainer>
        <template #pageToggle>
            <SubPageToogle>
                <SubPageButton name="Lotes Pendientes" class="mr-2"
                :selected="selectedSubPage === 'pendientes'"
                @select="toogleSubPage('pendientes')"
                />

                <SubPageButton name="Lotes en Proceso" class="mx-2"
                :selected="selectedSubPage === 'proceso'"
                @select="toogleSubPage('proceso')"
                />

                <SubPageButton name="Lotes Terminados" class="ml-2"
                :selected="selectedSubPage === 'terminados'"
                @select="toogleSubPage('terminados')"
                />
            </SubPageToogle>
        </template>

        <template #content>
            <RouterView />
        </template>
    </GenericContainer>
</template>
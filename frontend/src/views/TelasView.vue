<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import { useLocalStorage } from '@vueuse/core';
import SubPageToogle from '@/components/SubPageToogle.vue';
import SubPageButton from '@/components/SubPageButton.vue';
import GenericContainer from '@/components/GenericContainer.vue';

const router = useRouter()
const subPageName = ref('tipos-tela')
const selectedSubPage = useLocalStorage<string | null>('current_sub_page_telas', subPageName)

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
                <SubPageButton name="Tipos de tela" class="mr-2"
                :selected="selectedSubPage === 'tipos-tela'"
                @select="toogleSubPage('tipos-tela')"
                />

                <SubPageButton name="Colores de tela" class="ml-2"
                :selected="selectedSubPage === 'colores-tela'"
                @select="toogleSubPage('colores-tela')"
                />
            </SubPageToogle>
        </template>

        <template #content>
            <RouterView />
        </template>
    </GenericContainer>
</template>
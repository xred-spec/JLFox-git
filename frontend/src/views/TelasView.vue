<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useLocalStorage } from '@vueuse/core';
import SubPageToogle from '@/components/SubPageToogle.vue';
import SubPageButton from '@/components/SubPageButton.vue';
import GenericContainer from '@/components/GenericContainer.vue';

const router = useRouter()
const selectedSubPage = useLocalStorage<string | null>('current_sub_page_telas', null)
selectedSubPage.value = 'tipos-tela'

const toogleSubPage = (subPage: string) => {
    selectedSubPage.value = subPage
    router.push({name: subPage})
}
</script>

<template>
    <GenericContainer>
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

        <template #content>
            <RouterView />
        </template>
    </GenericContainer>
</template>
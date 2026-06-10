<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useLocalStorage } from '@vueuse/core';
import SubPageToogle from '@/components/SubPageToogle.vue';
import SubPageButton from '@/components/SubPageButton.vue';
import GenericContainer from '@/components/GenericContainer.vue';

const router = useRouter()
const selectedSubPage = useLocalStorage<string | null>('current_sub_page_bordados', null)
selectedSubPage.value = 'colores-hilo'

const toogleSubPage = (subPage: string) => {
    selectedSubPage.value = subPage
    router.push({name: subPage})
}
</script>

<template>
    <GenericContainer>
        <SubPageToogle>
            <SubPageButton name="Colores de hilo" class="mr-2"
            :selected="selectedSubPage === 'colores-hilo'"
            @select="toogleSubPage('colores-hilo')"
            />

            <SubPageButton name="Bordados" class="ml-2"
            :selected="selectedSubPage === 'sub-bordados'"
            @select="toogleSubPage('sub-bordados')"
            />
        </SubPageToogle>

        <template #content>
            <RouterView />
        </template>
    </GenericContainer>
</template>
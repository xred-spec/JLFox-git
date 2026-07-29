<script setup lang="ts">
import { useRouter } from 'vue-router';
import { useLocalStorage } from '@vueuse/core';
import SubPageToogle from '@/components/SubPageToogle.vue';
import SubPageButton from '@/components/SubPageButton.vue';
import GenericContainer from '@/components/GenericContainer.vue';
import { onMounted, ref } from 'vue';

const router = useRouter()
const subPageName = ref('tipos-prenda')
const selectedSubPage = useLocalStorage<string | null>('current_sub_page_prendas', subPageName)

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
        <SubPageToogle>
            <SubPageButton name="Tipos de prendas" class="mr-2"
            :selected="selectedSubPage === 'tipos-prenda'"
            @select="toogleSubPage('tipos-prenda')"
            />

            <SubPageButton name="Piezas de prendas" class="mx-2"
            :selected="selectedSubPage === 'partes-prenda'"
            @select="toogleSubPage('partes-prenda')"
            />

            <SubPageButton name="Prendas" class="ml-2"
            :selected="selectedSubPage === 'sub-prendas'"
            @select="toogleSubPage('sub-prendas')"
            />
        </SubPageToogle>

        <template #content>
            <RouterView />
        </template>
    </GenericContainer>
</template>
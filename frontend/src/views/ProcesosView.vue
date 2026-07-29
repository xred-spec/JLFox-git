<script setup lang="ts">
import { useRouter } from 'vue-router';
import { useLocalStorage } from '@vueuse/core';
import SubPageToogle from '@/components/SubPageToogle.vue';
import SubPageButton from '@/components/SubPageButton.vue';
import GenericContainer from '@/components/GenericContainer.vue';
import { onMounted, ref } from 'vue';

const router = useRouter()
const subPageName = ref('sub-procesos')
const selectedSubPage = useLocalStorage<string | null>('current_sub_page_procesos', subPageName)

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
            <SubPageButton name="Procesos" class="mr-2"
            :selected="selectedSubPage === 'sub-procesos'"
            @select="toogleSubPage('sub-procesos')"
            />

            
            <SubPageButton name="Prendas-Procesos" class="ml-2"
            :selected="selectedSubPage === 'prendas-procesos'"
            @select="toogleSubPage('prendas-procesos')"
            />
        </SubPageToogle>

        <template #content>
            <RouterView />
        </template>
    </GenericContainer>
</template>
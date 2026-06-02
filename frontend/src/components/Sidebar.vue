<script setup lang="ts">
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import { useLocalStorage } from '@vueuse/core';
//import DeployItemSidebar from './DeployItemSidebar.vue';
import ItemSidebar from './ItemSidebar.vue';

const router = useRouter()
const storedSelected = useLocalStorage<string | null>('current_page', null)
const itemSelected = ref(storedSelected.value)

const routeTo = (routeName: string) => {
    itemSelected.value = routeName
    storedSelected.value = itemSelected.value
    router.push({name: routeName})
}
</script>

<template>
    <div class="flex flex-col h-screen justify-start border-r-2 border-[#ac7b3a] w-70 bg-[#f8eee1]">
        <div class="flex items-center justify-center h-14 bg-[#000000] border-b-2 border-[#ac7b3a]">
        </div>

        <ItemSidebar name="Bordados" 
        :selected="itemSelected === 'bordados'"
        @select="routeTo('bordados')"/>
        <ItemSidebar name="Forros" 
        :selected="itemSelected === 'forros'"
        @select="routeTo('forros')"/>
        <ItemSidebar name="Telas" 
        :selected="itemSelected === 'telas'"
        @select="routeTo('telas')"/>
    </div>
</template>
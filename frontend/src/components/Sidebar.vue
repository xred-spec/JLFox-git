<script setup lang="ts">
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import { useLocalStorage } from '@vueuse/core';
import DeployItemSidebar from './DeployItemSidebar.vue';
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
    <div class="flex flex-col h-screen justify-start border-r-2 border-[#ac7b3a] w-80 bg-[#e4e4e4]">
        <div class="flex items-center justify-center h-14 bg-[#000000] border-b-2 border-[#ac7b3a]">
            <p class="font-bold text-[#ffffff]">JLFox Tracking System</p>
        </div>

        <DeployItemSidebar 
        name="Materia prima"/>
        <ItemSidebar name="Bordados" 
        :selected="itemSelected === 'bordados'"
        @select="routeTo('bordados')"/>
        <ItemSidebar name="Forros" 
        :selected="itemSelected === 'forros'"
        @select="routeTo('forros')"/>
        <ItemSidebar name="Telas" 
        :selected="itemSelected === 'telas'"
        @select="routeTo('telas')"/>

        <DeployItemSidebar 
        name="Prendas-Procesos"/>
        <ItemSidebar name="Prendas" 
        :selected="itemSelected === 'prendas'"
        @select="routeTo('prendas')"/>
        <ItemSidebar name="Procesos" 
        :selected="itemSelected === 'sub-procesos'"
        @select="routeTo('sub-procesos')"/>


        <DeployItemSidebar 
        name="Producción"/>
        
        <ItemSidebar name="Producción" 
        :selected="itemSelected === 'produccion'"
        @select="routeTo('produccion')"/>
        <ItemSidebar name="Inventario" 
        :selected="itemSelected === 'inventario'"
        @select="routeTo('inventario')"/>

    </div>
</template>
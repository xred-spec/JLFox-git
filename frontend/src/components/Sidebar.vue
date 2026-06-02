<script setup lang="ts">
import { useRouter } from 'vue-router';
//import DeployItemSidebar from './DeployItemSidebar.vue';
import ItemSidebar from './ItemSidebar.vue';

const router = useRouter()

const routeTo = (routeName: string) => {
    router.push({name: routeName})
}
</script>

<template>
    <div class="flex flex-col h-screen justify-start border-r-2 border-[#ac7b3a] w-70 bg-[#f8eee1]">
        <div class="flex items-center justify-center h-14 bg-[#000000] border-b-2 border-[#ac7b3a]">
        </div>
        
        <ItemSidebar :selected="false" name="Bordados" 
        @select="routeTo('bordados')"/>
        <ItemSidebar :selected="false" name="Forros" 
        @select="routeTo('forros')"/>
        <ItemSidebar :selected="false" name="Telas" 
        @select="routeTo('telas')"/>
    </div>
</template>
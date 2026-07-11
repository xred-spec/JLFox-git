<script setup lang="ts">
import Sidebar from '@/components/Sidebar.vue';
import { onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/auth';

const auth = useAuthStore()
const router = useRouter()

const logout = () => {
    auth.logout()
    router.push({path: '/'})
}

onMounted(() => {
    router.push({name: 'bordados'})
})
</script>

<template>
    <div class="flex min-w-screen min-h-screen">
        <Sidebar />

        <div class="flex flex-col flex-1 bg-[#e4e4e4]">
            <div class="header flex items-center justify-between min-h-14 bg-[#000000] border-b-2 border-[#ac7b3a] py-2 px-5">

                <p class="font-bold text-[#d1a66f]">JLFox Tracking System</p>

                <button class="font-bold flex items-center py-1 px-5 rounded-[5px] text-[#ffffff] cursor-pointer bg-[#c41a1a]"
                @click="logout">
                    Cerrar sesión
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-log-out-icon lucide-log-out size-6 pl-2"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
                </button>
            </div>

            <div class="flex px-5 py-2 items-start justify-center size-full">
                <RouterView />
            </div>
        </div>
    </div>
</template>
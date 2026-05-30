<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/auth';
import { useApi } from '@/composables/useApi';

const emptyUsername = ref(false)
const emptyPassword = ref(false)

const username = ref('')
const password = ref('')
const errorMessage = ref('')

const router = useRouter()
const authStore = useAuthStore()

async function handleLogin() {
    if(!username.value) {
        emptyUsername.value = true
    } 
    if(!password.value) {
        emptyPassword.value = true
    }

    errorMessage.value = ''

    const {data, error} = await useApi('login').post({
        username: username.value,
        password: password.value
    }).json()

    if(error.value) {
        console.log('El login NO logeó')    
        errorMessage.value = 'Credenciales incorrectas o error en el servidor'
        return
    }

    if(data.value) {
        authStore.setSession(data.value.token, data.value.user)
    }

    console.log('El login si logeó')
}
</script>

<template>

    <div class="min-h-screen min-w-screen flex items-center justify-center bg-[#FFFFFF]/50">
        <div class="grid grid-cols-2 gap-0 min-h-[80vh] min-w-[75vw] shadow-2xl rounded-[15px]">

            <div class="flex flex-col justify-center items-center bg-[#f0dfc9] rounded-[15px] rounded-r-none py-10 px-14">
                <h1 class="mb-2 text-4xl w-full text-center font-bold text-[#311f07]">
                    Iniciar sesión
                </h1>

                <h3 class="mb-6 text-lg w-full text-center font-medium text-[#311f07]">
                    Ingrese con los datos que se le proporcionaron
                </h3>
                <form class="w-full flex flex-col items-center"
                @submit.prevent="handleLogin">
                    <div class="w-full flex flex-col justify-center my-2">
                        <div class="flex justify-between">
                            <label class="font-xl font-bold text-[#311f07] px-5 mb-1 text-start">
                                Nombre de usuario:
                            </label>
                            <p v-if="emptyUsername"
                            class="font-xl font-bold text-[#c41a1a] px-5 mb-1 text-end">
                                Falta llenar el campo
                            </p>
                        </div>
                        <input  class="bg-[#FFFFFF] py-3 px-5 rounded-[10px] font-bold text-[#311f07] border-b-2 border-[#63492a] placeholder:text-[#311f07]/50"
                        type="text"
                        placeholder="Introduzca su nombre de usuario"
                        v-model="username">
                    </div>

                    <div class="w-full flex flex-col justify-center my-2">
                        <div class="flex justify-between">
                            <label class="font-xl font-bold text-[#311f07] px-5 mb-1 text-start">
                                Contraseña:
                            </label>
                            <p v-if="emptyPassword"
                            class="font-xl font-bold text-[#c41a1a] px-5 mb-1 text-end">
                                Falta llenar el campo
                            </p>
                        </div>
                        <input  class="bg-[#FFFFFF] py-3 px-5 rounded-[10px] font-bold text-[#311f07] border-b-2 border-[#63492a] placeholder:text-[#311f07]/50"
                        type="password"
                        placeholder="Introduzca su contraseña"
                        v-model="password">
                    </div>

                    <button class="my-6 rounded-[15px] w-full font-bold text-lg text-[#ffffff] py-3 bg-[#63492a] cursor-pointer hover:scale-105"
                    type="submit">
                        Iniciar sesión
                    </button>

                    <p class="mb-5 text-lg w-full text-center font-medium text-[#311f07]">
                        Por seguridad solo se pueden crear más usuarios dentro de la aplicación
                    </p>

                    <button class="rounded-[15px] font-bold text-base text-[#311f07] px-5 py-3 cursor-pointer hover:scale-105 hover:underline">
                        Olvidé mis datos
                    </button>
                </form>
            </div>

            <div class="flex flex-col justify-center items-center bg-[#000000] rounded-[10px] rounded-l-none p-10 ">
                <h2 class="text-white text-5xl font-extrabold">Logo</h2>
            </div>
        </div>
    </div>
</template>
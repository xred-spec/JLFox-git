<script setup lang="ts">
import { ref } from 'vue';
import { useApi } from '@/composables/useApi';
import { useAuthStore } from '@/stores/auth';

const emits = defineEmits<{
    (e: 'close'): void,
}>()


const emptyUsername = ref(false)
const emptyPassword = ref(false)
const emptyPasswordConfirmation = ref(false)
const emptyEmail = ref(false)

const username = ref('')
const email = ref('')
const password = ref('')
const passwordConfirmation = ref('')
const rolId = ref(1)
const errorMessage = ref('')

const authStore = useAuthStore()

async function reigsterUser() {
    if(!username.value) {
        emptyUsername.value = true
    } 
    if(!password.value) {
        emptyPassword.value = true
    }
    if(!passwordConfirmation.value) {
        emptyPasswordConfirmation.value = true
    }
    if(!email.value) {
        emptyEmail.value = true
    }

    errorMessage.value = ''

    const {data, error} = await useApi('register').post({
        username: username.value,
        email: email.value,
        password: password.value,
        password_confirmation: passwordConfirmation.value,
        rol_id: rolId.value
    }).json()

    if(error.value) {
        console.log('El register NO registró')    
        errorMessage.value = 'Credenciales incorrectas o error en el servidor'
        return
    }

    if(data.value) {
        authStore.setSession(data.value.token, data.value.user)
    }

    console.log('El register si registró')
}
</script>

<template>
    <div class="modal-fondo fixed inset-0 bg-black/40 backdrop-blur-sm transition-all duration-300 px-4 z-50
    flex items-center justify-center" 
    @click="emits('close')">
        <div 
        @click.stop
        class="flex flex-col justify-center w-full max-w-[40vw] bg-[#f0dfc9] rounded-[15px] p-10">
            <h1 class="mb-10 text-4xl w-full text-center font-bold text-[#311f07]">
                Crear cuenta
            </h1>

            <form class="w-full flex flex-col items-center"
            @submit.prevent="reigsterUser">
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
                            Email:
                        </label>
                        <p v-if="emptyEmail"
                        class="font-xl font-bold text-[#c41a1a] px-5 mb-1 text-end">
                            Falta llenar el campo
                        </p>
                    </div>
                    <input  class="bg-[#FFFFFF] py-3 px-5 rounded-[10px] font-bold text-[#311f07] border-b-2 border-[#63492a] placeholder:text-[#311f07]/50"
                    type="email"
                    placeholder="Introduzca su email"
                    v-model="email">
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

                <div class="w-full flex flex-col justify-center my-2">
                    <div class="flex justify-between">
                        <label class="font-xl font-bold text-[#311f07] px-5 mb-1 text-start">
                            Confirmar contraseña:
                        </label>
                        <p v-if="emptyPasswordConfirmation"
                        class="font-xl font-bold text-[#c41a1a] px-5 mb-1 text-end">
                            Falta llenar el campo
                        </p>
                    </div>
                    <input  class="bg-[#FFFFFF] py-3 px-5 rounded-[10px] font-bold text-[#311f07] border-b-2 border-[#63492a] placeholder:text-[#311f07]/50"
                    type="password"
                    placeholder="Introduzca su contraseña"
                    v-model="passwordConfirmation">
                </div>

                <button class="mt-10 w-full rounded-[15px] font-bold text-lg text-[#ffffff] py-3 bg-[#63492a] cursor-pointer hover:scale-105"
                type="submit">
                    Crear cuenta
                </button>

                <button class="mt-2 w-full rounded-[15px] font-bold text-lg text-[#ffffff] py-3 bg-[#c41a1a] cursor-pointer hover:scale-105"
                @click="emits('close')">
                    Cerrar
                </button>
            </form>
        </div>
    </div>
</template>
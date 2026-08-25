import { defineStore } from 'pinia'
import { useLocalStorage } from '@vueuse/core'
import { computed } from 'vue'

export const useAuthStore = defineStore('auth', () => {
    const token = useLocalStorage<string | null>('auth_token', null)
    const user = useLocalStorage<any | null>('auth_user', null)

    const isAuthenticated = computed(() => !!token.value)

    function setSession(newToken: string, userData: any) {
        token.value = newToken
        user.value = userData
    }

    function logout() {
        token.value = null
        user.value = null

        localStorage.clear()
    }

    return { token, user, isAuthenticated, setSession, logout }
});
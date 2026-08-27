import { createFetch } from "@vueuse/core";
import { useAuthStore } from "@/stores/auth";

export const useApi = createFetch({
    baseUrl:'https://jlfox.onrender.com/api/',
    //baseUrl:'http://localhost:8000/api/',
    options: {
        async beforeFetch({options}) {
            const authStore = useAuthStore();

            options.headers = {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            };  

            if(authStore.token) {
                options.headers['Authorization'] = `Bearer ${authStore.token}`;
            }

            return {options};
        },
    },

    fetchOptions: {
        mode: 'cors',
    }
});
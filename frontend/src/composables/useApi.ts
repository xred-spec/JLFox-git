import { createFetch } from "@vueuse/core";

export const useApi = createFetch({
    baseUrl:'http://localhost:8000/api',
    options: {
        async beforeFetch({options}) {
            options.headers = {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            };  

            return {options};
        },
    },

    fetchOptions: {
        mode: 'cors',
    }
});
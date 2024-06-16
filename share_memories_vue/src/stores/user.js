import {defineStore} from 'pinia'

export const useUserStore = defineStore('userStore', {
    state: () => ({
        auth: false,
        user: [],
    }),
    getters: {
        // getAuth() {
        //     return this.auth
        // },
    },
    actions: {
        setAuth(bl) {
            this.auth = bl
        },
    }
    // const count = ref(0)
    // const doubleCount = computed(() => count.value * 2)
    // function increment() {
    //     count.value++


    // return { count, doubleCount, increment }
})
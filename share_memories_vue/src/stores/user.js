import {defineStore} from 'pinia'

export const useUserStore = defineStore('userStore', {
    state: () => ({
        isAuth: false,
        user: {},
    }),
    getters: {
        getAuth() {
            return this.isAuth
        },
        getUser() {
            return this.user
        }
    },
    actions: {
        setAuth(bool) {
            this.isAuth = bool
            localStorage.setItem('isAuth', bool)
        },
        setUser(user) {
            this.user = user
        },
    }
})
import {defineStore} from 'pinia'

export const useUserStore = defineStore('userStore', {
    state: () => ({
        isAuth: false,
        user: {},
        countAlbums: 0,
    }),
    getters: {
        getAuth() {
            return this.isAuth
        },
        getUser() {
            return this.user
        },
        getCountAlbums() {
            return this.countAlbums
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
        setCountAlbums(data) {
            this.countAlbums = data
        },
        iterationCountAlbum() {
            this.countAlbums++
        }
    }
})
import {defineStore} from 'pinia'

export const useAlbumsStore = defineStore('albumsStore', {
    state: () => ({
        showFormAlbums: false,
    }),
    getters: {
        getShowFormAlbums() {
            return this.showFormAlbums
        },
    },
    actions: {
        setShowFormAlbums(bool) {
            this.showFormAlbums = bool
        },
    }
})
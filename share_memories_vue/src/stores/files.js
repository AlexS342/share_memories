import {defineStore} from 'pinia'

export const useFilesStore = defineStore('filesStore', {
    state: () => ({
        showFormFiles: false,
    }),
    getters: {
        getShowFormFiles() {
            return this.showFormFiles
        },
    },
    actions: {
        setShowFormFiles(bool) {
            this.showFormFiles = bool
        },
    }
})
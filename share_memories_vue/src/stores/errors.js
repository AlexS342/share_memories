import {defineStore} from 'pinia'

export const useErrorsStore = defineStore('errorsStore', {
    state: () => ({
        status: false,
        code: 0,
        errors: [],
    }),
    getters: {
        getStatus() {
            return this.status
        },
        getCode() {
            return this.code
        },
        getErrors() {
            return this.errors
        },
        getData() {
            return {'status': this.status, 'code': this.code, 'errors': this.errors}
        },
    },
    actions: {
        setStatus(bool) {
            this.status = bool
            localStorage.setItem('errorsStatus', bool)
        },
        setCode(code) {
            this.code = code
            localStorage.setItem('errorsCode', code)
        },
        setErrors(data) {
            this.code = data
        },
        setData(data) {
            this.status = true
            this.code = data.code
            this.errors = data.errors
        },
        setFromLocalStorage() {
            this.status = localStorage.getItem('errorsStatus') === 'true'
            this.code = parseInt(localStorage.getItem('errorsCode'))
            this.errors = JSON.parse(localStorage.getItem('errorsArray'))
        },
        clearErrors(){
            this.status = false
            this.code = 0
            this.errors = []
        }
    }
})
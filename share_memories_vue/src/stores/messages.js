import {defineStore} from 'pinia'

export const useMessagesStore = defineStore('messagesStore', {
    state: () => ({
        status: false,
        messages: [],
    }),
    getters: {
        getStatus() {
            return this.status
        },
        getMessages() {
            return this.messages
        },
        getData() {
            return {'status': this.status, 'messages': this.messages}
        },
    },
    actions: {
        setStatus(bool) {
            this.status = bool
            localStorage.setItem('messagesStatus', bool)
        },
        setMessages(data) {
            this.messages = data
        },
        setData(data) {
            this.status = true
            this.messages = data
        },
        setFromLocalStorage() {
            this.status = localStorage.getItem('messagesStatus') === 'true'
            this.message = JSON.parse(localStorage.getItem('messagesArray'))
        },
        clearMessages(){
            this.status = false
            this.messages = []
        }
    }
})
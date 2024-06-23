<template>
    <form name="album">
        <label for="name">Название альбома</label>
        <input type="text" id="name" name="name" v-model="name">
        <br/>
        <label for="rights1">
            Всем посетителям
            <input type="radio" id="rights1" name="rights" value="Всем посетителям" v-model="rights">
        </label>
        <br/>
        <label for="rights2">
            Всем пользователям
            <input type="radio" id="rights2" name="rights" value="Всем пользователям" v-model="rights">
        </label>
        <br/>
        <label for="rights3">
            Друзьям и подписчикам
            <input type="radio" id="rights3" name="rights" value="Друзьям и подписчикам" v-model="rights">
        </label>
        <br/>
        <label for="rights4">
            Только друзьям
            <input type="radio" id="rights4" name="rights" value="Только друзьям" v-model="rights">
        </label>
        <br/>
        <label for="rights5">
            Только мне
            <input type="radio" id="rights5" name="rights" value="Только мне" v-model="rights">
        </label><br/>
        <label for="description">Описание</label>
        <textarea id="description" name="description" cols="30" rows="4" v-model="description"></textarea>
        <input type="button" value="Создать" v-on:click="creat()">
    </form>
</template>

<script>
import axios from "axios";
import {useErrorsStore} from "@/stores/errors.js"
import {useMessagesStore} from "@/stores/messages.js"
import {useUserStore} from "@/stores/user.js"
export default {
    name: "FormAlbum",

    setup() {
        const errorsStore = useErrorsStore()
        const messagesStore = useMessagesStore()
        const userStore = useUserStore()

        return {errorsStore, userStore, messagesStore}
    },
    data() {
        return {
            'name': '',
            'rights': '',
            'description': '',
        }
    },
    // created() {},
    methods: {
        creat: function (){
            axios.post('/api/albums/create', {
                name: this.name,
                rights: this.rights,
                description: this.description,
            })
                .then((response) => {
                    this.name = ''
                    this.rights = ''
                    this.description = ''

                    this.messagesStore.setData(response.data.message);
                    this.userStore.iterationCountAlbum()

                    let strMessages = JSON.stringify(response.data.message)
                    localStorage.setItem('messagesStatus', 'true')
                    localStorage.setItem('messagesArray', strMessages)
                })
                .catch((errors) => {

                    let arrErr = []
                    arrErr.push(errors.message)

                    for(let key in errors.response.data.errors){
                        arrErr.push(... errors.response.data.errors[key])
                    }

                    let data = {'code': errors.response.status, errors: arrErr}
                    this.errorsStore.setData(data)

                    let strErrors = JSON.stringify(data.errors)
                    localStorage.setItem('errorsStatus', 'true')
                    localStorage.setItem('errorsCode', data.code)
                    localStorage.setItem('errorsArray', strErrors)
                })
        }

    }
}
</script>

<style scoped>

</style>
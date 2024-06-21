<script setup>
import {useErrorsStore} from "@/stores/errors.js"
const errorsStore = useErrorsStore()
import {useMessagesStore} from "@/stores/messages.js";
const messagesStore = useMessagesStore()
</script>

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
        <input type="button" value="Создать" v-on:click="creat(errorsStore, messagesStore)">
    </form>
</template>

<script>
import axios from "axios";
export default {
    name: "FormAlbum",
    data() {
        return {
            'name': '',
            'rights': '',
            'description': '',
        }
    },
    // created() {},
    methods: {
        creat: function (errorsStore, messagesStore){
            axios.post('/api/album_create', {
                name: this.name,
                rights: this.rights,
                description: this.description,
            })
                .then((response) => {
                    messagesStore.setData(response.data.message)

                    let strErrors = JSON.stringify(response.data.message)
                    localStorage.setItem('messagesStatus', 'true')
                    localStorage.setItem('messagesArray', strErrors)
                })
                .catch((errors) => {

                    let arrErr = []
                    arrErr.push(errors.message)

                    for(let key in errors.response.data.errors){
                        arrErr.push(... errors.response.data.errors[key])
                    }

                    let data = {'code': errors.response.status, errors: arrErr}
                    errorsStore.setData(data)

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
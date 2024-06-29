<template>
    <div class="wrp1">
        <div class="wrp2">
            <h4 class="header">Создать новый альбом</h4>
            <form action="" class="form">
                <label for="name" class="label">Название</label>
                <input class="inputText" type="text" id="name" name="name" v-model="name">

                <div class="radioWrp">
                    <h5 class="radioTitle">Кому буден виден альбом</h5>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights1" name="rights" value="Всем посетителям"
                               v-model="rights">
                        <label for="rights1" class="radioLabel">Все посетителям
                            сайта</label>
                    </div>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights2" name="rights" value="Всем пользователям"
                               v-model="rights">
                        <label for="rights2" class="radioLabel">Все пользователям
                            сайта</label>
                    </div>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights3" name="rights" value="Друзьям и подписчикам"
                               v-model="rights">
                        <label for="rights3" class="radioLabel">Друзьям и
                            подписчикам</label>
                    </div>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights4" name="rights" value="Только друзьям"
                               v-model="rights">
                        <label for="rights4" class="radioLabel">Только
                            друзьям</label>
                    </div>
                    <div class="radioInputWrp">
                        <input class="radioInput" type="radio" id="rights5" name="rights" value="Только мне"
                               v-model="rights">
                        <label for="rights5" class="radioLabel">Только мне</label>
                    </div>
                </div>

                <label class="label" for="description1">Описание альбома</label>
                <textarea class="textarea" name="description" id="description1"
                          rows="5" v-model="description"></textarea>

                <div class="action">
                    <button type="button" class="button" v-on:click="hideForm">Отмена</button>
                    <button type="button" class="button" v-on:click="creat">Создать</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {useErrorsStore} from "@/stores/errors.js"
import {useMessagesStore} from "@/stores/messages.js"
import {useUserStore} from "@/stores/user.js"
import {useAlbumsStore} from "@/stores/albums.js";
export default {
    name: "FormAlbum",

    setup() {
        const errorsStore = useErrorsStore()
        const messagesStore = useMessagesStore()
        const userStore = useUserStore()
        const albumsStore = useAlbumsStore()

        return {errorsStore, userStore, messagesStore, albumsStore}
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
        hideForm: function () {
            this.albumsStore.setShowFormAlbums(false)
        },
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

                    this.albumsStore.setShowFormAlbums(false)
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

                    this.albumsStore.setShowFormAlbums(false)
                })
        }

    }
}
</script>

<style scoped>
.wrp1{
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background-color: rgba(59, 167, 255, 0.75);
    position: fixed;
    top: 0;
    left: 0;
}
.wrp2{
    min-width: 300px;
    display: flex;
    flex-direction: column;
    background-color: white;
    padding: 24px;
    border: 1px solid rgb(224, 224, 224);
    border-radius: 6px;
}
.header{
    font-size: 18px;
    font-weight: 700;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 12px;
}
.form{
    display: flex;
    flex-direction: column;
}
.label{
    font-size: 14px;
    font-weight: 500;
}
.inputText{
    margin-bottom: 12px;
}
.radioWrp{
    margin-bottom: 12px;
}
.radioTitle{
    font-size: 14px;
    font-weight: 500;
}
.radioInputWrp{
    width: 100%;
}
.radioInput{
    margin-right: 6px;
}
.radioLabel{
    font-size: 14px;
    font-weight: 300;
}
.textarea{
    font-size: 12px;
    min-width: 100%;
    box-sizing: border-box;
    margin-bottom: 12px;
}
.action{
    width: 100%;
    display: flex;
    justify-content: space-between;
    box-sizing: border-box;
    padding: 0 12px;
    margin-bottom: -12px;
}
.button{

}
</style>
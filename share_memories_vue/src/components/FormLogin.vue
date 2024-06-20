<script setup>
import {useUserStore} from "@/stores/user.js";
const userStore = useUserStore()
</script>

<template>
    <form class="form" name="login">
        <div class="formItem">
            <label for="username">Логин</label>
            <input type="email" id="username" name="username" v-model="login">
        </div>
        <div class="formItem">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" v-model="password">
        </div>
        <div class="formButton">
            <button type="button" id="back">Отмена</button>
            <button type="button" id="checkIn" v-on:click="sendData(userStore)">Войти</button>
        </div>
    </form>
</template>

<script>
import axios from "axios";
export default {
    name: "FormLogin",
    data() {
        return {
            login: "",
            password: "",
        }
    },
    created() {
        /**
         * При рендере компонента открываем сессию и получаем токен
         */
        axios.get('/sanctum/csrf-cookie')
            .then((response) => {
                console.log('CSRF OK => ' + response.status);
            })
            .catch((error) => {
                console.log('CSRF ERROR => ' + error.message);
            })
    },
    methods: {
        sendData: async function (store) {
            await axios.post('/login', {
                email: this.login,
                password: this.password,
            })
                .then((response) => {
                    console.log('TheLogin sendData OK => ' + response.status)
                    this.getUser(store)
                    store.setAuth(true)
                    this.$router.push({path: '/lenta'})
                })
                .catch((error) => {
                    console.log('TheLogin sendData ERROR => ' + error.message)
                    this.actionErr(store, error)
                })
        },
        getUser: async function (store) {
            await axios.get('/api/user')
                .then((response) => {
                    console.log('TheLogin getUser OK => ' + response.data.name)
                    store.setUser(response.data)
                })
                .catch((error) => {
                    console.log('TheLogin getUser ERROR => ' + error.message)
                    console.log(error.message)
                    this.actionErr(store, error)
                })
        },
        actionErr: function (store, error) {
            if(error.response.status === 401 || error.response.status === 419 || error.response.status === 422){
                store.setAuth(false);
                localStorage.setItem('isAuth', 'false')
                this.$router.push({path: '/login'})
            }
        }
    }
}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/
.form {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-sizing: border-box;
}

.formItem {
    width: 100%;
    display: flex;
    justify-content: space-between;
    box-sizing: border-box;
    margin-bottom: 8px;
}

label {
    margin-right: 6px;
}

input {
    width: 150px;
}

.formButton {
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    box-sizing: border-box;
    padding-top: 12px;
}

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>


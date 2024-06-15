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
            <button type="button" id="checkIn" v-on:click="sendData">Войти</button>
        </div>
    </form>
    <button type="button" v-on:click="logout">выйти</button>
</template>

<script>
import axios from "axios";

export default {
    name: "TheLogin",
    data() {
        return {
            login:"",
            password:"",
        }
    },
    created() {
        /**
         * При рендере компонента открываем сессию и получаем токен
         */
        axios.get('/sanctum/csrf-cookie')
            .then((response) => {
                console.log(response);
            })
            .catch((error) => {
                console.log(error);
            })
    },
    methods: {
        sendData: async function () {
            await axios.post('/login', {
                    email: this.login,
                    password: this.password,
                })
                .then((response) => {
                    console.log(response)
                    this.$router.push({path:'/lenta'})
                })
                .catch((errors) => {
                    console.log(errors)
                }
            )
        },
        logout: async function () {
            console.log('Отправляю POST запрос на LOGOUT')
            await axios.post('/logout')
                .then((response) => {
                    console.log(response)
                    this.$router.push({path:'/'})
                })
                .catch((errors) => {
                        console.log(errors)
                    }
                )
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


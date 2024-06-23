<template>
    <form name="registration" action="#" method="post">
        <p class="inform">Поля, отмеченные "*" обязательны для заполнения!!!</p>
        <label for="name">Имя *
            <input type="text" id="name" name="name" v-model="name">
        </label>
        <label for="birth_date">Дата рождения
            <input type="date" id="birth_date" name="birth_date" min="1924-01-01" v-model="birth_date">
        </label>
        <div class="labelWrp">
            <p>Пол</p>
            <div class="labelWrpItem">
                <label>муж.
                    <input type="radio" name="gender" value="man" v-model="gender">
                </label>
                <label>жен.
                    <input type="radio" name="gender" value="women" v-model="gender">
                </label>
            </div>
        </div>
        <label for="email">Логин *
            <input type="email" id="email" name="email" v-model="login">
        </label>
        <label for="password">Пароль *
            <input type="password" id="password" name="password" v-model="password">
        </label>
        <label for="repeatPassword">Пароль *
            <input type="password" id="repeatPassword" name="repeatPassword" v-model="repeatPassword">
        </label>
        <div class="buttons">
            <input type="button" id="back" value="Отмена">
            <button type="button" id="checkIn" v-on:click="sendData()">Зарегистрироваться</button>

        </div>
    </form>
</template>

<script>
import axios from "axios";
import {useUserStore} from "@/stores/user.js";
export default {
    name: "FormRegistration",
    setup() {
        const userStore = useUserStore()
        return {userStore}
    },
    data() {
        return {
            name:"",
            birth_date: null,
            gender: "",
            login:"",
            password:"",
            repeatPassword: "",
        }
    },
    // created() {},
    methods: {
        sendData: async function () {
            await axios.post('/register', {
                name: this.name,
                email: this.login,
                birth_date: this.getBirthDateUnix(),
                gender: this.gender,
                password: this.password,
                password_confirmation: this.repeatPassword,
            })
                .then((response) => {
                    console.log('TheRegistration sendData OK => ' + response.status)
                    this.getUser()
                    this.userStore.setAuth(true)
                    //TODO реализовать сообщение об упешном входе

                    this.$router.push({path:'/lenta'})
                })
                .catch((error) => {
                    console.log('TheRegistration sendData ERROR' + error.message)
                    this.actionErr(error)

                    //TODO реализовать сообщение с ошибками
                })
        },
        getBirthDateUnix: function (){
            if(this.birth_date !== null){
                return new Date(this.birth_date).getTime() / 1000
            }else{
                return null
            }
        },
        getUser: async function () {
            await axios.get('/api/user')
                .then((response) => {
                    console.log('TheRegistration getUser ERROR' + response.data.name)
                    this.userStore.setUser(response.data)
                })
                .catch((error) => {
                    console.log('TheRegistration getUser ERROR' + error.message)
                    this.actionErr(error)
                })
        },
        actionErr: function (error) {
            if(error.response.status === 401 || error.response.status === 419){
                this.userStore.setAuth(false);
                localStorage.setItem('isAuth', 'false')
                this.$router.push({path: '/login'})
            }
        }
    },

}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/
form {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-sizing: border-box;
    padding: 6px;
}
.inform{
    color: red;
    font-size: 12px;
    font-weight: 300;
    margin-bottom: 6px;
}
label {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}
.labelWrp{
    width: 100%;
    display: flex;
    justify-content: space-between;
}
.labelWrpItem{
    display: flex;
    margin-left: 12px;
}
.buttons{
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    margin-top: 12px;
}

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>




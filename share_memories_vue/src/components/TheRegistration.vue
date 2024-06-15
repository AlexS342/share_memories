<template>
    <form name="registration" action="#" method="post">
        <p class="inform">Поля, отмеченные "*" обязательны для заполнения!!!</p>
        <label for="name">Имя *
            <input type="text" id="name" name="name" v-model="name" required>
        </label>
        <label for="date">Дата рождения
            <input type="date" id="date" name="date">
        </label>
        <div class="labelWrp">
            <p>Пол</p>
            <div class="labelWrpItem">
                <label>муж.
                    <input type="radio" name="sex" value="man">
                </label>
                <label>жен.
                    <input type="radio" name="sex" value="women">
                </label>
            </div>
        </div>
        <label for="email">Логин *
            <input type="email" id="email" name="email" v-model="login" required>
        </label>
        <label for="password">Пароль *
            <input type="password" id="password" name="password" v-model="password" required>
        </label>
        <label for="repeatPassword">Пароль *
            <input type="password" id="repeatPassword" name="repeatPassword" v-model="repeatPassword" required>
        </label>
        <div class="buttons">
            <input type="button" id="back" value="Отмена">
            <button type="button" id="checkIn" v-on:click="sendData">Зарегистрироваться</button>
        </div>
    </form>
</template>

<script>
import axios from "axios";

export default {
    name: "TheRegistration",
    data() {
        return {
            name:"",
            login:"",
            password:"",
            repeatPassword: "",
        }
    },
    methods: {
        sendData: async function () {
            console.log('Отправляю POST запрос на регистрацию : имя = ' + this.name + 'email = ' + this.login + ', password = ' + this.password)
            await axios.post('/register', {
                name: this.name,
                email: this.login,
                password: this.password,
                password_confirmation: this.repeatPassword,
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




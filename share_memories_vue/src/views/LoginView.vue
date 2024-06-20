<script setup>
import MainHeader from '../components/TheHeader.vue'
import MainMenu from '../components/TheMenu.vue'
import FormLogin from '../components/FormLogin.vue'
import FormRegistration from '../components/FormRegistration.vue'
</script>
<template>
    <MainHeader />
    <MainMenu />
    <main>
        <div class="wrp">
            <div class="buttons">
                <div class="buttonsItem">
                    <a href="#" v-on:click="goLogin">Вход</a>
                </div>
                <div class="buttonsItem">
                    <a href="#" v-on:click="goRegistration">Регистрация</a>
                </div>
            </div>
            <div v-if="login" class="form">
                <h1>Вход</h1>
                <p>Форма для авторизации</p>
                <FormLogin />
            </div>
            <div v-else class="form">
                <h1>Регистрация</h1>
                <p>Форма для регистрации</p>
                <FormRegistration />
            </div>
        </div>

    </main>
</template>

<script>
export default {
    name: "LoginView",
    data() {
        return {
            login: true,
        }
    },
    methods: {
        goRegistration: function () {
            this.login = false
        },
        goLogin: function () {
            this.login = true
        }
    }
}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/
main{
    display: flex;
    flex-direction: column;
    align-items: center;
    box-sizing: border-box;
    padding-top: 20px;
}
.wrp{
    width: 300px;
    border: 1px solid #bfbfbf;
    border-radius: 10px;
    background-color: white;
}
.buttons{
    display: flex;
    justify-content: space-evenly;
    margin: 12px;
}
.buttonsItem{
    width: 50%;
    display: flex;
    justify-content: center;
}
.buttonsItem>a{
    box-sizing: border-box;
    padding: 6px;
    text-decoration: none;
    color: #3378ff;
}
.form{
    display: flex;
    flex-direction: column;
    align-items: center;
    box-sizing: border-box;
    padding: 6px 12px;
}
.form>h1{
    text-transform: uppercase;
    margin-bottom: 6px;
}
.form>p{
    font-size: 12px;
    text-transform: lowercase;
}
/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>


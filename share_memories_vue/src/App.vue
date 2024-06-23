<script setup>
import {RouterView} from 'vue-router';
import axios from "axios";
import {useUserStore} from "@/stores/user.js";
import {useErrorsStore} from "@/stores/errors.js";
import {useMessagesStore} from "@/stores/messages.js";

const userStore = useUserStore();
const errorsStore = useErrorsStore();
const messagesStore = useMessagesStore();

if (localStorage.getItem('isAuth') === 'true') {
    userStore.setAuth(true);
    getDataUser();
} else {
    userStore.setAuth(false);
}
async function getDataUser() {
    await axios.get('/api/user')
        .then((response) => {
            console.log('APP.JS GET USER OK =>' + response.data.name);
            userStore.setUser(response.data);
        })
        .catch((error) => {
            console.log('APP.JS GET USER ERROR => ' + error.message);
            if(error.response.status === 401 || error.response.status === 419){
                userStore.setAuth(false);
                localStorage.setItem('isAuth', 'false')
                this.$router.push({path: '/login'})
            }
        });
}

if(localStorage.getItem('errorsStatus') === 'true'){
    errorsStore.setFromLocalStorage();
}
function getStatusErr() {
    return errorsStore.getStatus
}
function clearErrors () {
    errorsStore.clearErrors()
    localStorage.setItem('errorsStatus', 'false')
    localStorage.setItem('errorsCode', '0')
    localStorage.setItem('errorsArray', '[]')
}

if(localStorage.getItem('messagesStatus') === 'true'){
    messagesStore.setFromLocalStorage();
}
function getStatusMessages() {
    return messagesStore.getStatus
}
function clearMessages () {
    messagesStore.clearMessages()
    localStorage.setItem('messagesStatus', 'false')
    localStorage.setItem('messagesArray', '[]')
}

</script>

<template>
    <div v-if="getStatusErr()" style="width: 100%; display: flex; flex-direction: column; align-items: center; background: rgba(255,140,140,0.78); box-sizing: border-box; padding: 12px 24px">
        <p v-for="(item, index) in errorsStore.getErrors" :key="index" style="color: red; margin-bottom: 12px">{{item}}</p>
        <input type="button" value="OK" v-on:click="clearErrors">
    </div>
    <div v-if="getStatusMessages()" style="width: 100%; display: flex; flex-direction: column; align-items: center; background: rgba(175, 255, 95, 0.75);; box-sizing: border-box; padding: 12px 24px">
        <p v-for="(item, index) in messagesStore.getMessages" :key="index" style="color: rgb(0 42 105);; margin-bottom: 12px">{{item}}</p>
        <input type="button" value="OK" v-on:click="clearMessages">
    </div>
    <RouterView/>
</template>

<script>



</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>

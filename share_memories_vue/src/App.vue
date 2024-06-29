<template>
    <div class="mainWRP">
        <TheHeader/>
        <main>
            <TheMenu/>

            <template v-if="getStatusErr()">
                <AlertError/>
            </template>
            <template v-if="getStatusMessages()">
                <AlertMessage/>
            </template>

            <RouterView/>
        </main>
    </div>
    <TheFooter/>
</template>

<script>
import AlertMessage from "@/components/AlertMessage.vue";
import AlertError from "@/components/AlertError.vue";
import TheHeader from "@/components/TheHeader.vue";
import TheMenu from "@/components/TheMenu.vue";
import TheFooter from "@/components/TheFooter.vue";

import axios from "axios";

import {useUserStore} from "@/stores/user.js";
import {useErrorsStore} from "@/stores/errors.js";
import {useMessagesStore} from "@/stores/messages.js";


export default {
    name: "MainHeader",
    data() {
        return {}
    },
    components: {
        AlertMessage,
        AlertError,
        TheFooter,
        TheHeader,
        TheMenu,
    },
    setup() {
        const userStore = useUserStore();
        const errorsStore = useErrorsStore();
        const messagesStore = useMessagesStore();
        return {userStore, errorsStore, messagesStore}
    },
    created() {
        if (localStorage.getItem('isAuth') === 'true') {
            this.userStore.setAuth(true);
            this.getDataUser();
        } else {
            this.userStore.setAuth(false);
        }
        if (localStorage.getItem('errorsStatus') === 'true') {
            this.errorsStore.setFromLocalStorage();
        }
        if (localStorage.getItem('messagesStatus') === 'true') {
            this.messagesStore.setFromLocalStorage();
        }
    },
    methods: {
        getDataUser: async function () {
            await axios.get('/api/user')
                .then((response) => {
                    console.log('APP.JS GET USER OK =>' + response.data.name);
                    this.userStore.setUser(response.data);
                })
                .catch((error) => {
                    console.log('APP.JS GET USER ERROR => ' + error.message);
                    if (error.response.status === 401 || error.response.status === 419) {
                        this.userStore.setAuth(false);
                        localStorage.setItem('isAuth', 'false')
                        this.$router.push({path: '/login'})
                    }
                })
        },
        getStatusMessages: function () {
            return this.messagesStore.getStatus
        },
        getStatusErr: function () {
            return this.errorsStore.getStatus
        }
    },
}

</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/

/*@media (min-width: 1024px) and (max-width: 1199px){ }*/
/*@media (min-width: 768px) and (max-width: 1028px) {}*/
/*@media (min-width: 480px) and (max-width: 767px) {}*/
/*@media (max-width: 479px) {}*/
</style>

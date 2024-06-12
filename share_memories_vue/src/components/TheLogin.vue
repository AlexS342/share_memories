<template>
    <form class="form" name="login" action="#" method="post">
        <div class="formItem">
            <label for="email">Логин</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="formItem">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="formButton">
            <button type="button" id="back">Отмена</button>
            <button type="button" id="checkIn">Войти</button>
        </div>
    </form>
</template>

<script>
export default {
    name: "TheLogin"
}
</script>

<style scoped>
/*Стили по умолчанию для экранов 1200px и больше*/
.form{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-sizing: border-box;
}
.formItem{
    width: 100%;
    display: flex;
    justify-content: space-between;
    box-sizing: border-box;
    margin-bottom: 8px;
}
label{
    margin-right: 6px;
}
input{
    width: 150px;
}
.formButton{
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


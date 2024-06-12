<template>
    <form name="registration" action="#" method="post">
        <label for="name">Имя
            <input type="text" id="name" name="name" required>
        </label>
        <label for="date">Дата рождения
            <input type="date" id="date" name="date" required>
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
        <label for="email">Логин
            <input type="email" id="email" name="email" required>
        </label>
        <label for="password">Пароль
            <input type="password" id="password" name="password" required>
        </label>
        <label for="repeatPassword">Пароль
            <input type="password" id="repeatPassword" name="repeatPassword" required>
        </label>
        <div class="buttons">
            <input type="button" id="back" value="Отмена">
            <input type="button" id="checkIn" value="Войти">
        </div>
    </form>
</template>

<script>
export default {
    name: "TheRegistration"
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




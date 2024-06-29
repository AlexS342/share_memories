<template>
    <div class="wrp">
        <div class="count">
            <span class="countText">стр. 2 из 17</span>
        </div>
        <ol class="list">
            <li class="listItem">
                <a class="listItemLink" href="#">
                    <img class="listItemLinkImg" src="/img/icons/backward.svg" alt="backward">
                </a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">1</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">2</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">3</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">4</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">5</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">6</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">7</a>
            </li>
            <li class="listItem">
                <a class="listItemLink" href="#">
                    <img class="listItemLinkImg" src="/img/icons/forward.svg" alt="forward">
                </a>
            </li>
        </ol>
    </div>
</template>

<script>
export default {
    name: "ThePagination"
}
</script>

<style scoped>
.wrp{
    width: 1024px;
    box-sizing: border-box;
    padding: 12px 24px;
    display: flex;
    justify-content: space-between;
}
.count{
    box-sizing: border-box;
    padding: 4px;
}
.countText{
    font-size: 14px;
    font-weight: 500;
}
.list{
    display: flex;
    flex-wrap: nowrap;
}
.listItem{
    margin: 0 6px;
}
.listItemLink{
    padding: 4px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    color: rgb(25, 105, 255);
}
.listItemLinkImg{
    width: 12px;
}
</style>
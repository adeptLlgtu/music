<template>
    <div class="enter">
        <div class="enter-choise">
            <router-link to="/login">Вход</router-link> |
            <router-link to="/register">Регистраиця</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Enter',
        methods:{},
        mounted() {
            let header = document.querySelector('.header')
            if(header){
                header.remove()
            }
        }
    }
</script>


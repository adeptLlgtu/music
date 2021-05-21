<template>
    <div class="header">
        <div class="header-btn">
            <div class="header-btn__item"></div>
            <div class="header-btn__item"></div>
        </div>
        <div class="header-nav">
            <router-link class="header-link" to="/home">Главная</router-link>
            <router-link class="header-link" to="/moderation">Модерация</router-link>
            <router-link class="header-link" to="/">Выход</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Header',
        methods:{
            headerMenu(){
                let headerBtnItem = document.querySelectorAll('.header-btn__item')
                let flag = false
                let headerBtn = document.querySelector('.header-btn')
                let nav = document.querySelector('.header-nav')
                headerBtn.onclick = () =>{
                    if (flag === false){
                        headerBtnItem[0].style.transform = 'rotate(45deg)'
                        headerBtnItem[1].style.transform = 'rotate(-45deg)'
                        headerBtnItem[0].style.top = '50%'
                        headerBtnItem[1].style.top = '50%'
                        nav.style.right = '0%'
                        flag = true
                    }
                    else{
                        headerBtnItem[0].style.transform = 'rotate(0deg)'
                        headerBtnItem[1].style.transform = 'rotate(0deg)'
                        headerBtnItem[0].style.top = '0%'
                        headerBtnItem[1].style.top = '0.5rem'
                        nav.style.right = '-120%'
                        flag = false
                    }
                }
            },
        },
        mounted() {
            this.headerMenu()
            if (localStorage.root === '0' && window.location.pathname !== '/'){
                alert('Доступ запрещен!')
                window.location.pathname = '/'
            }
            if (window.location.pathname === '/moderation'){
                if (localStorage.root === '1'){
                    alert('Доступ запрещен!')
                    window.location.pathname = '/home'
                }
                if (localStorage.root === '0'){
                    window.location.pathname = '/'
                }
            }
            if (window.location.pathname === '/'){
                localStorage.root = '0'
            }
            if (localStorage.root === '1'){
                let links = document.querySelectorAll('.header-link')
                links[1].remove()
            }

        }
    }

</script>


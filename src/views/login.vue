<template>
    <div class="enter">
        <form class="enter-choise">
            <label for="login">Логин</label>
            <input placeholder="Логин" id="login" name="login" type="text">
            <label for="password">Пароль</label>
            <input placeholder="********" id="password" name="password" type="password">
            <button @click="login" type="button">Вход</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'Login',

        data(){
            return{
                users: [],
                userFlag: false
            }
        },

        methods:{
            login(){
                let inputs = document.querySelectorAll('input');

                let fullUsers = this.users;



                for (let i=0; i<fullUsers.length; i++){
                    if (fullUsers[i].login === inputs[0].value || fullUsers[i].password === inputs[1].value){
                        this.userFlag = true
                        if (fullUsers[i].root === '0'){
                            alert('Вашу заявку еще не подтвердили.')
                        }
                        else{
                            this.userFlag = true
                            localStorage.root = fullUsers[i].root
                            window.location.pathname = '/home'
                        }
                    }
                    else{

                    }
                }
                if (this.userFlag === false){
                    alert('Вы ввели неверные логин или пароль.')
                }
            }
        },

        created() {
            this.$http.get('http://music-orm.loc/api/from:users').then(function(data){
                this.users = JSON.parse(JSON.stringify(data.body));

            })
        },
        mounted() {
            let header = document.querySelector('.header')
            if(header){
                header.remove()
            }
            this.test()
        }
    }

</script>


<template>
    <div class="enter">
        <form class="enter-choise">
            <label for="login">Логин</label>
            <input placeholder="Логин" id="login" name="login" type="text">
            <label for="password">Пароль</label>
            <input placeholder="********" id="password" name="password" type="password">
            <button @click.prevent="register" type="submit">Регистрация</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'Register',
        methods:{
            register(e){
                let form = document.querySelector('form')
                e.target.onclick = async () => {
                    let formData = new FormData(form)
                    let response = await fetch('http://music-orm.loc/api/registration', {
                        method: 'POST',
                        body: formData
                    });
                    let result = await response.json();
                    alert('Вашу заявку проверит администратор. Ожидайте.')
                    window.location.pathname = '/'
                };
            }
        },
        mounted() {
            let header = document.querySelector('.header')
            if(header){
                header.remove()
            }
        }
    }

</script>


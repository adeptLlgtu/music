<template>
    <div id="moderation">
        <h2>{{pageTitle}}</h2>
        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Логин</td>
                <td>Права</td>
            </tr>
            </thead>
        </table>
        <form v-for="user in users" action="">
            <p class="user-id">{{user.id}}</p>
            <p>{{user.login}}</p>
            <input name="root" :value="user.root" type="text">
            <button type="submit" @click="roots">Сохранить</button>
        </form>
    </div>
</template>

<script>


    export default {
        name: 'Moderation',
        components: {

        },
        data: function () {
            return {
                users: [],
                pageTitle: 'Модерация'
            };
        },
        methods:{
            roots(e){

                e.target.parentNode.onsubmit = async () => {
                    let form = e.target.parentNode
                    let formData = new FormData(form)
                    let userId = e.target.parentNode.querySelector('.user-id')
                    formData.append('id', userId.innerHTML)
                    alert('Изменения сохранены!')
                    let response = await fetch('http://music-orm.loc/api/roots', {
                        method: 'POST',
                        body: formData
                    });
                    let result = await response.json();

                };
            }
        },
        created() {
            this.$http.get('http://music-orm.loc/api/from:users').then(function(data){
                this.users = JSON.parse(JSON.stringify(data.body));

            })
        },
        mounted() {
            document.title = this.pageTitle

            if (localStorage.root === '1'){
                let moderation = document.querySelector('#moderation')
                moderation.remove()
            }
        },
    }


</script>


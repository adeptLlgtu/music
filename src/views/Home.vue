<template>
  <div class="home">
    <h2>{{pageTitle}}</h2>
    <table>
      <thead>
      <tr>
        <td>Id</td>
        <td>Наименование</td>
        <td>И/Н</td>
        <td>Производитель</td>
        <td>Модель</td>
      </tr>
      </thead>
      <tbody>
      <tr :class="{td_table: true, tr_td: tr_td}" v-for="instrument in instruments">
        <td>{{instrument.id}}</td>
        <td>{{instrument.name}}</td>
        <td>{{instrument.number}}</td>
        <td>{{instrument.maker}}</td>
        <td>{{instrument.model}}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'Home',
  components: {

  },
  data(){
    return{
      pageTitle: 'Главная',
      instruments: [],
      tr_td: false,
      n: 0,

    }
  },

  methods:{
    colorize(){
        let block = document.querySelectorAll('.td_table')
      console.log(block)
      for (let i=0; i<block.length; i++){
        if(i%2){
          block[i].style.background= '#F5F5F5';
        }
      }
    }
  },
  created() {
    this.$http.get('http://music-orm.loc/api/from:instruments').then(function(data){
      this.instruments = JSON.parse(JSON.stringify(data.body));

    })
  },
  mounted(){
    document.title = this.pageTitle


    setTimeout(this.colorize, 100)
  }
}
</script>

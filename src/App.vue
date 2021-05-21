<template>
  <div id="app">
    <div class="dark-back"></div>
    <div class="container">
      <Header></Header>
      <router-view/>
    </div>
  </div>
</template>

<script>
  import Header from './components/Header'
  import './assets/styles.scss'

  export default {
    name: 'App',
    components: {
      Header
    },
    data: function () {
      return {

      };
    },
    methods:{

    },
    mounted() {

    },
  }


</script>


<template>
  <div class="teste">
    <img alt="Vue logo" src="../assets/logo.png">
    <HelloWorld msg="Bem vindo ao Vue.js App"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'Teste',
  components: {
    HelloWorld
  }
}
</script>

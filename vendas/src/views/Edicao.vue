<template>
  <h1>Edição de usuário</h1>
</template>

<script>
export default {
  mounted: function() {
    let usuario_id = this.$route.params.id
    alert("olá " + usuario_id)
  }

}
</script>

<style>

</style>
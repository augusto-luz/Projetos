<template>
    <q-page class="q-pb-lg q-mb-lg">
        <q-list padding separator>
            <q-item-label header>Listagem de Notícias</q-item-label>
            <q-item v-for="noticia in noticias" clickable tag="a" @click="exibeActionNoticia(noticia)" v-ripple :key="noticia.id">
                <q-item-section top avatar>
                <q-avatar>
                    <img :src="host + noticia.imagem"/> 
                </q-avatar>
                </q-item-section>

                <q-item-section>
                    <q-item-label>{{ noticia.titulo }}</q-item-label>
                    <q-item-label caption lines="2">{{ noticia.data_publicacao }}</q-item-label>
                </q-item-section>
            </q-item>
        </q-list>

        <q-dialog v-model="exibeAction">
            <q-card class="full-width">
                <q-card-section class="row items-center">
                    <q-avatar icon="contact_support" color="primary" text-color="white" />
                    <span class="q-ml-sm">O que você deseja fazer?</span>
                </q-card-section>

                <q-card-actions align="right">
                <q-btn flat label="Ver" color="primary" v-close-popup @click="verNoticia"/>
                <q-btn flat label="Editar" color="warning" v-close-popup @click="editarNoticia"/>
                <q-btn flat label="Excluir" color="negative" v-close-popup @click="excluirNoticia"/>
                </q-card-actions>
            </q-card>
        </q-dialog>

        <q-page-sticky position="bottom-right" :offset="[18, 18]">
            <q-btn round icon="add" color="primary" size="md" @click="$router.push('/noticias/form/')"/>
          </q-page-sticky>
    </q-page>
</template>

<script>
import { defineComponent } from 'vue'
import { api } from 'boot/axios'

export default defineComponent({
  name: 'NoticiasIndex',
// :to="'/noticias/' + noticia.id"
  data() {
    return {
      noticias: [],
      host: process.env.HOST,
      exibeAction: false,
      noticiaAction: null
    }
  },

  methods: {
      exibeActionNoticia: function(noticia) {
          this.exibeAction = true
          this.noticiaAction = noticia
      },

      verNoticia: function() {
          this.$router.push('/noticias/' + this.noticiaAction.id + '/show')
      },

      editarNoticia: function() {
          this.$router.push('/noticias/form/' + this.noticiaAction.id)
      },    

      excluirNoticia: function() {

      }
  },
  
  mounted() {
    api.get('api/noticias/')
      .then((response) => {
        this.noticias = response.data
      })
      .finally(() => {
          /* Finalizou a requisicao */
      })
  }
})
</script>

<style>

</style>

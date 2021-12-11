<template>
  <q-page class="q-pt-md q-px-md">
      <q-form ref="formulario">
          <q-input 
            v-model="noticia.titulo" 
            label="Título" 
            :rules="[val => !!val || 'Este campo é obrigatório']"
           />

           <q-input
            v-model="noticia.conteudo"
            autogrow
            label="Conteúdo"
            :rules="[val => !!val || 'Este campo é obrigatório']"
            />

            <q-file 
                v-model="noticia.imagem" 
                label="Imagem" 
            />

            <q-input v-model="noticia.data_publicacao" mask="##/##/####" label="Data de Publicação">
                <template v-slot:append>
                    <q-icon name="event" class="cursor-pointer">
                    <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                        <q-date v-model="noticia.data_publicacao" mask="DD/MM/YYYY">
                        <div class="row items-center justify-end">
                            <q-btn v-close-popup label="Close" color="primary" flat />
                        </div>
                        </q-date>
                    </q-popup-proxy>
                    </q-icon>
                </template>
            </q-input>

            <q-select 
                v-model="noticia.status" 
                :options="[{label: 'Ativo', value: 'A'}, {label: 'Inativo', value: 'I'}]" 
                label="Status" 
            />

            <q-btn 
                color="primary" 
                label="Salvar" 
                icon="save" 
                class="q-mt-lg"
                @click="submit"
            />
      </q-form>
  </q-page>
</template>

<script>
import { api } from 'boot/axios'

export default {
    data() {
        return {
            noticia: {
                titulo: null,
                conteudo: null,
                imagem: null,
                data_publicacao: null,
                status: null
            }
        }
    },

    methods: {
        submit: function() {
            this.$refs.formulario.validate()
                .then((sucesso) => {
                    if (sucesso) {
                        const dados = new FormData()
                        dados.append('conteudo', this.noticia.conteudo)
                        dados.append('data_publicacao', this.noticia.data_publicacao)
                        dados.append('imagem', this.noticia.imagem)
                        dados.append('status', this.noticia.status.value)
                        dados.append('titulo', this.noticia.titulo)

                        api.post('/api/noticias', dados , {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                            .then((response) => {
                                console.log(response)

                                
                            })
                    }
                })
        }
    }
}
</script>

<style>

</style>

<template>
  <div>
    <div class="form-group">
      <input class="form-control" type="text" v-model="search" placeholder="Digite o que está procurando...">
    </div>
    <div class="list-group">
      <div v-if="result.length > 0">
        <button v-for="r in result" v-on:click="selected_button(r)" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ r | title }}</h5>
          </div>
        </button>
      </div>
      <div v-else-if="result.length == 0 && search.length > 0">
        <div class="alert alert-warning" role="alert">
          <feather type="frown" size="15px"></feather> Não encontramos nada parecido.
        </div>
      </div>
      <div v-else>
        <div class="alert alert-primary" role="alert">
          <feather type="alert-circle" size="15px"></feather> Inicie a pesquisa para a exibição dos resultados.
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Feather from 'vue-feather';

export default {
  data(){
    return {
      search: '',
      result: []
    }
  },
  components: {
    Feather
  },
  filters: {
    title: function(r){
      if(r.title !== undefined){
        return r.title;
      }else if(r.name !== undefined){
        return r.name;
      }else if(r.título){
        return r.título;
      }else if(r.nome){
        return r.nome;
      }
      return 'Title not found!';
    }
  },
  watch: {
    search: function(newValue){
      if(newValue !== ''){
        axios.get('/'+ this.entity +'?s='+newValue)
             .then(response => (this.result = response.data.data));
      }
    }
  },
  methods:{
    selected_button: function(r, event){
      console.log('Item selecionado '+r.id);
    }
  },
  props: ['entity']
}
</script>

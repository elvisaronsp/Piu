<template>
  <div class="row">
    <div class="form-group col-md-4">
      <input class="form-control mb-1" type="text" v-model="search" placeholder="Digite o que está procurando...">
      <div class="list-group">
        <div v-if="result.length > 0">
          <button v-for="r in result" v-on:click="selected_button(r)" class="list-group-item list-group-item-action" :key="r.id">
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
    <div class="col-md-7">
      <list-header-component :entity="entity" :entity-id="parentId"></list-header-component>
      <list-card-component :data="manual" :entity="listEntity" :parentId="parentId"></list-card-component>
    </div>
  </div>
</template>

<script>
import Feather from 'vue-feather';
import GenericTableComponent from '../tables/GenericTableComponent';
import ListCardComponent from '../components/ListCardComponent';
import ListHeaderComponent from '../components/ListHeaderComponent';

export default {
  data(){
    return {
      search: '',
      result: [],
      manual: {},
      parentId: 0
    }
  },
  mounted(){
    if(this.listEntity == undefined){
      this.listEntity = this.entity;
    }
  },
  components: {
    Feather, GenericTableComponent, ListCardComponent, ListHeaderComponent
  },
  watch: {
    search: function(newValue){
      if(newValue !== ''){
        axios.get('/'+ this.entity +'?s='+newValue)
             .then(response => {this.result = response.data.data});
      }
    }
  },
  methods:{
    selected_button: function(r, event){
      let url = this.$routes.base + this.urlFetchManual.replace(':id:', r.id);
      console.log(url);
      axios.get(url).then(response => {
        this.manual = response.data;
        this.parentId = r.id;
      });
    }
  },
  /*
    A listEntity por padrão é definida por entity, mas também pode ser definida como uma entidade separada que funciona
    em comum acordo com o urlFetchManual, este, por sua vez, fica encarregado de carregar uma pesquisa com essas outras entidades
    de acordo com a entidade principal selecionada.
    Por exemplo: As entidades principais são turmas, após listadas, quando clicadas elas disparam um evento que usa o urlFetchManual
    para carregar os alunos daquela turma.
  */
  props: ['entity', 'url', 'urlFetchManual', 'listEntity']
}
</script>

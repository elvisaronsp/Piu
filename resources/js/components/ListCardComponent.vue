<template>
  <div class="row">
    <div v-if="data_computed == undefined || data_computed <= 0" class="card col-md-12">
      <div class="card-body">
        Nada encontrado por aqui.
      </div>
    </div>
    <div v-else class="card mb-1 col-md-12" v-for="d in data_computed">
      <div class="card-body">
        <h5 class="card-title">
          {{ d | title }}
        </h5>
        <h6 class="card-subtitle mb-2 text-muted"></h6>
        <button v-for="e in $entities[entity]" v-on:click="e.click(d.id, parentId)" :class="'mr-1 btn btn-'+e.style">{{ e.label }}</button>
      </div>
    </div>
  </div>
</template>
<script>
  /*
    Este componente carrega resultados de uma pesquisa em uma série de cards que correspondem a cada unidade de registro retornado.
    As opções do card ficam no arquivo entities.js no índice da respectiva entidade.
    Propriedades:
      data: São os dados que deverão ser carregados,
      entity: A entidade que será carregada,
      parentId: Id do dono das entidades. Ex.: Se as entidades são alunos eles podem pertencer a uma determinada turma.
  */
  export default {
    props: ['data', 'entity', 'parentId'],
    computed: {
      data_computed: function(){
        return this.data.data;
      }
    }
  }
</script>

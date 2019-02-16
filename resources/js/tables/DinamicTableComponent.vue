<template>
  <div>
    <table v-if="data_lenght > 0" class="table table-responsive table-hover table-striped">
      <thead style="background-color: white">
        <tr>
          <th scope="col" v-for="attribute in attributes">{{ attribute }}</th>
          <th scope="col">ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(value, key, index) in data_computed[0]">
          <td v-for="v in value">{{ v }}</td>
          <table-action-component :data="value" :entity="entity"></table-action-component>
        </tr>
      </tbody>
    </table>
    <div v-else class="card">
      <div class="card-body">
        Não há registros por aqui
      </div>
    </div>
  </div>
</template>

<script>
  import TableActionComponent from './TableActionComponent';

  export default {
    components: {
      TableActionComponent
    },
    props: ['data', 'entity'],
    data(){
      return {

      }
    },
    computed: {
      data_computed: function(){
        if(this.data !== undefined){
            return Object.values(this.data);
        }
        return {};
      },
      data_lenght: function(){
        if(this.data_computed[0] !== undefined){
          return this.data_computed[0].length;
        }else{
          return 0;
        }
      },
      attributes: function(){
        let attributes = {};
        for(var i = 0; i < this.data_computed.length; i++){
            if(this.data_computed[i][0]){
              attributes= Object.keys(this.data_computed[i][0]);
            }
            break;
        }
        return attributes;
      }
    },
    methods:{

    }
  }
</script>

<template>
  <div>
    <div v-if="!manual">
      <dinamic-table-component v-if="$store.state[entity].length == 0" :data="data" :entity="entity" :custom="custom"></dinamic-table-component>
      <dinamic-table-component v-else :data="$store.state[entity]" :entity="entity" :custom="custom"></dinamic-table-component>
    </div>
    <dinamic-table-component v-else :data="manualData" :entity="entity" :custom="custom"></dinamic-table-component>
    <pagination :data="data" @pagination-change-page="getResults"></pagination>
  </div>
</template>

<script>

import DinamicTableComponent from './DinamicTableComponent';
import Pagination from 'laravel-vue-pagination';

export default {
  props: ['entity', 'url', 'manual', 'manualData', 'custom'],
  data(){
    return {
      data: {},

    }
  },
  mounted(){
    this.getResults();
  },
  watch: {
    manualData: function(newValue){
      this.data = this.manualData;
    }
  },
  methods: {
    getResults(page = 1) {
      if(this.manual == false || this.manual == undefined){
        let url = '';
        if(this.url !== undefined){
          url = '/' + this.url + '&page=' + page;
        }else{
          url = '/' + this.entity + '?page=' + page;
        }
        axios.get(url)
        .then(response => {
          this.data = response.data;
        });
      }
		}
  },
  components: {
    DinamicTableComponent, Pagination
  }
}
</script>

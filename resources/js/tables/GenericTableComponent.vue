<template>
  <div>
    <dinamic-table-component :data="data" :entity="entity"></dinamic-table-component>
    <pagination :data="data" @pagination-change-page="getResults"></pagination>
  </div>
</template>

<script>

import DinamicTableComponent from './DinamicTableComponent';
import Pagination from 'laravel-vue-pagination';

export default {
  props: ['entity', 'url'],
  data(){
    return {
      data: {}
    }
  },
  mounted(){
    this.getResults();
  },
  methods: {
    getResults(page = 1) {
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
  },
  components: {
    DinamicTableComponent, Pagination
  }
}
</script>

<style lang="css" scoped>
</style>

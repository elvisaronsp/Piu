<template>
  <div>
    <dinamic-table-component :data="data"></dinamic-table-component>
    <!--<pagination :data="data" @pagination-change-page="getResults"></pagination>-->
  </div>
</template>

<script>

import DinamicTableComponent from './DinamicTableComponent';
//import Pagination from 'laravel-vue-pagination';

export default {
  props: ['entity'],
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
			axios.get('/' + this.entity + '?page=' + page)
				.then(response => {
          this.data = response.data;
				});
		}
  },
  components: {
    DinamicTableComponent //, Pagination
  }
}
</script>

<style lang="css" scoped>
</style>

<template>
  <td>
    <a :class="'btn btn-primary btn-sm mr-1'" :href="editLink" title="Editar"><feather type="edit-2"></feather></a>
    <button v-on:click="deleteEntity" class="btn btn-danger btn-sm mr-1" title="Excluir"><feather type="delete"></feather></button>
    <a v-for="c in custom" :class="'btn btn-sm mr-1 btn-'+c.type" v-on:click="c.click(data.id)" :href="c.url" :title="c.title" :key="c.id"><feather :type="c.icon"></feather></a>
  </td>
</template>

<script>
import Feather from 'vue-feather';

export default {
  components: {
    Feather
  },
  props: ['data', 'entity'],
  data(){
    return {
      editLink: '/'+ this.entity +'/edit/'+ this.data.id,
      custom: []
    };
  },
  methods: {
    deleteEntity: function(){
      if(confirm('Deseja realmente excluir?')){
        let url = '/'+ this.entity + '/destroy/'+this.data.id;
        axios.post(url, {
                 _token: this.$csrf
              })
             .then(response => {
                this.showMessage('Concluído', response.data);
                window.location.reload();
             })
             .catch(err => this.showMessage('Ops! Ocorreu um problema', err.response.data));
      }
    }
  },
  mounted() {
      this.custom = this.$table_custom[this.entity];
  }
}
</script>

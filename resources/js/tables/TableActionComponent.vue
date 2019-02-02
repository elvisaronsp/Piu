<template>
  <td>
    <a :class="'btn btn-primary btn-sm mr-1'" :href="editLink" title="Editar"><feather type="edit-2"></feather></a>
    <button :onclick="deleteEntity" :class="'btn btn-danger btn-sm mr-1'" title="Excluir"><feather type="delete"></feather></button>
    <a v-for="c in custom" :class="'btn btn-sm mr-1 btn-'+c.type" v-on:click="c.click(data.id)" :href="c.url" :title="c.title"><feather :type="c.icon"></feather></a>
  </td>
</template>

<script>
import Feather from 'vue-feather';
//import VModal from 'vue-js-modal';

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
        axios.post('/'+ entity + '/delete/' + data.id)
             .then(response => {console.log(response.data)});
      }
    }
  },
  mounted() {
      this.custom = this.$table_custom[this.entity];
  }
}
</script>

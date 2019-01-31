<template>
  <td>
    <a :class="'btn btn-primary btn-sm mr-1'" :href="editLink"><feather type="edit-2"></feather></a>
    <button :onclick="deleteEntity" :class="'btn btn-danger btn-sm mr-1'"><feather type="delete"></feather></button>
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
      editLink: '/'+ this.entity +'/edit/'+ this.data.id
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
}
</script>

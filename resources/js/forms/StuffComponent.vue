<template>
  <div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Turma</label>
        <select class="form-control" name="group_id" v-model="group">
          <option value="">Seleciona a turma</option>
          <option v-for="g in groups" :value="g.value">{{ g.label }}</option>
        </select>
      </div>
      <div class="form-group col-md-8">
        <label>Nome da matéria</label>
        <input class="form-control" type="text" v-model="title" name="title">
      </div>
    </div>
  </div>
</template>
<script>
import vSelect from 'vue-select';

export default {
  components: {
    vSelect
  },
  data(){
    return {
      title: '',
      groups_fetched: '',
      group: ''
    };
  },
  computed:{
    groups: function(){
      if(this.groups_fetched.length > 0)
      return this.toVSelectData(this.groups_fetched);
    }
  },
  methods: {
    loadGroups() {
      axios.get(this.$routes.groups.index)
            .then(response => this.groups_fetched = response.data.data)
            .catch(err => this.showMessage('Ops! Algo de errado aconteceu', err.exception));
    }
  },
  mounted() {
    this.loadGroups();
  }
}
</script>

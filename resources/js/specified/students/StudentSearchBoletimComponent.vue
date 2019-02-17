<template>
  <div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Seleciona a escola</label>
        <v-select v-model="school" :options="['foo','bar']"></v-select>
      </div>
      <div class="col-md-6">
        <label for="">Seleciona a turma</label>
        <v-select v-model="group" :options="['foo','bar']"></v-select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
        <label for="">Digite o seu CPF</label>
        <the-mask class="form-control" v-model="cpf" :mask="['###.###.###-##']" />
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
        school: '',
        group: '',
        cpf: ''
      }
    },
    methods: {
      loadBoletim() {

      }
    }
  }
</script>

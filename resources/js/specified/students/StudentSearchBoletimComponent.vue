<template>
  <div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Seleciona a escola</label>
        <v-select v-model="school" @search="loadSchools" :options="schools">
          <span slot="no-options">
            Nenhuma escola encontrada. Digite o nome para buscar
          </span>
        </v-select>
      </div>
      <div class="col-md-6">
        <label for="">Seleciona a turma</label>
        <v-select v-model="group" :options="groups">
          <span slot="no-options">
            Nenhuma turma encontrada. Digite o nome para buscar
          </span>
        </v-select>
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
        cpf: '',
        schools_fetched: [],
        groups_fetched: [],
      }
    },
    watch:{
      school: function(newValue){
          this.loadGroup();
      }
    },
    computed: {
      groups: function(){
        return this.toVSelectData(this.groups_fetched);
      },
      schools: function(){
        return this.toVSelectData(this.schools_fetched);
      }
    },
    methods: {
      loadBoletim() {

      },
      loadSchools(search, loading){
        loading(true);
        axios.get(this.$routes.schools.index+'?name='+search).then(response => {
          this.schools_fetched = response.data.data;
          loading(false);
        });
      },
      loadGroup(){
        axios.get(this.$routes.groups.index+'?school_id='+this.school.value)
              .then(response => {
                this.groups_fetched = response.data.data;
              });
      }
    }
  }
</script>

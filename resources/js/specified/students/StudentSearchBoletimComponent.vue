<template>
  <div class="card">
    <div class="card-body">
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
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-primary btn-lg" @click="loadBoletim">
            Buscar boletim
          </button>
        </div>
      </div>
    </div>
     <div class="col-md-12">
      <!-- Concluir-->
      <student-boletim-component v-if="found !== undefined || found == true" :student-group-id="student_group_id" :school-id="school.value">
      </student-boletim-component>
      <div v-else class="card">
        <div class="card-body">
          <p v-if="found == false">Boletim não encontrado</p>
          <p v-else>Preencha o formulário para buscar o boletim</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import vSelect from 'vue-select';
  import StudentBoletimComponent from './StudentBoletimComponent';
  export default {
    components: {
      vSelect, StudentBoletimComponent
    },
    data(){
      return {
        school: '',
        group: '',
        cpf: '',
        schools_fetched: [],
        groups_fetched: [],
        student_group_id: '',
        found: undefined
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
        axios.get(this.$routes.student_groups.indexJson+'?group_id='+this.group.value+'&cpf='+this.cpf+'&school_id='+this.school.value)
              .then(response => {
                console.log(response.data);
                if(response.data.data[0] !== undefined){
                  this.student_group_id = response.data.data[0].id;
                  this.found = true;
                }else{
                  this.found = false;
                }
              });
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

<template>
    <div>
        <h3>Transferir aluno para outra instituição</h3>
        <hr>
        <div class="row">
            <div class="col-md-12 form-group">
                <label>Instituição:</label>
                <v-select v-model="toSchool" maxHeight="200px" placeholder="Para onde o aluno será transferido?" :on-search="loadSchools" :options="schools"></v-select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
              <button class="btn btn-primary" @click="transferStudent" :disabled="disabled">
                Transferir aluno
              </button>
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
    props: ['studentId'],
    data(){
        return {
            schools: [],
            toSchool: ''
        }
    },
    computed: {
      disabled(){
        return this.toSchool.value == undefined;
      }
    },
    methods: {
        loadSchools(name, loading){
            loading(true);
            axios.get(this.$routes.schools.get.replace(':name:', name))
                  .then(response => {
                    this.schools = this.toVSelectData(response.data);
                    loading(false);
              
                  })
                  .catch(err => {
                    loading(false);
                    this.showMessage('Ops! Um erro ocorreu', 'Não foi possível carregar a lista de escolas por conta de um erro.');
                  })
        },
        transferStudent(){
          if(confirm('Você realmente deseja transferir este aluno? Esté é uma operação irreversível, tenha atenção!')){
            axios.post(this.$routes.student_transfer.store, {
              student_id: this.studentId, 
              new_school_id: this.toSchool.value,
              _token: this.$csrf
            }).then(response => {
              this.showMessage('Operação realizada', 'O aluno foi transferido para a nova instituição de ensino.'
              .concat(' Você não poderá alterar o cadastro do aluno, matriculá-lo, ou realizar qualquer tipo de operação relacionada.'))
            }).catch(err => this.showMessage('Ops! Há um erro aqui', 'Ocorreu um erro ao transferir o aluno, você deve contactar o administrador do sistema.'));   
          }
        }
    }
}
</script>


<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h3>Notas do aluno</h3>
        <p class="text-muted">{{ studentName }}</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <generic-table-component entity="grades" manual="true" :manual-data="grades"></generic-table-component>
      </div>
    </div>
  </div>
</template>
<script>
  import GenericTableComponent from '../../tables/GenericTableComponent';

  export default {
    props: ['studentGroupId'],
    data: function(){
      return {
        grades: '',
        student: ''
      };
    },
    mounted() {
      this.getStudent();
      this.getGrades();
    },
    computed:{
      studentName: function(){
        return this.student['nome do estudante'];
      }
    },
    methods:{
      getGrades: function(){
        let url = this.$routes.grades.index+'?student_group_id='+ this.studentGroupId;
        axios.get(url)
              .then(response => (this.grades = response.data))
              .catch(err => console.log(err));
      },
      getStudent: function(){
        axios.get('/student-groups/json?student_group_id=' + this.studentGroupId)
          .then(response => (this.student = response.data.data[0]))
          .catch(err => console.log(err));
      }
    }
  }
</script>

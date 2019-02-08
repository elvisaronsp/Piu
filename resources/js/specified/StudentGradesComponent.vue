<template>
  <div>
    <grade-chart-component></grade-chart-component>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h3>Notas do aluno</h3>
        <p class="text-muted">{{ studentName }}</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <generic-table-component entity="grades" :data="grades"></generic-table-component>
      </div>
    </div>
  </div>
</template>
<script>
  //import GenericTableComponent from '../tables/GenericTableComponent';
  //import StudentGradeChartComponent from './StudentGradeChartComponent';

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
        axios.get('/grades?student_group_id='+ this.student_group_id)
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

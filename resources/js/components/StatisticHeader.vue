<template>
  <div class="row">
    <div class="col-md-4">
      <card-header :title="students.title" :subtitle="studentsSubTitle" icon="user-check"></card-header>
    </div>
    <div class="col-md-4">
      <card-header :title="groups.title" :subtitle="groupsSubTitle" icon="grid"></card-header>
    </div>
    <div class="col-md-4">
      <card-header :title="employeers.title" :subtitle="employeersSubTitle" icon="users"></card-header>
    </div>
  </div>
</template>
<script>
  import CardHeader from './CardHeader'
  export default {
    data(){
      return {
        students: {
          count: '',
          title: 'Alunos',
          subtitle: ' aluno(s) cadastrado(s)'
        },
        groups: {
          count: '',
          title: 'Turmas',
          subtitle: ' turma(s) cadastrada(s)'
        },
        employeers: {
          count: '',
          title: 'Funcionários',
          subtitle: ' funcionário(s) cadastrado(s)'
        }
      }
    },
    computed: {
      studentsSubTitle: function(){
        return this.students.count + this.students.subtitle;
      },
      employeersSubTitle: function(){
        return this.employeers.count + this.employeers.subtitle;
      },
      groupsSubTitle: function(){
        return this.groups.count + this.groups.subtitle;
      }
    },
    methods: {
      loadStudents() {
        axios.get(this.$routes.statistic.studentsCount)
              .then(response => ( this.students.count = response.data.count ))
              .catch(err => this.showMessage('Ops! Um erro ocorreu', 'Não foi possível carregar a quantidade de alunos.'));
      },
      loadEmployeers() {
        axios.get(this.$routes.statistic.employeersCount)
              .then(response => ( this.employeers.count = response.data.count ))
              .catch(err => this.showMessage('Ops! Um erro ocorreu', 'Não foi possível carregar a quantidade de funcionários.'));
      },
      loadGroups() {
        axios.get(this.$routes.statistic.groupsCount)
              .then(response => ( this.groups.count = response.data.count ))
              .catch(err => this.showMessage('Ops! Um erro ocorreu', 'Não foi possível carregar a quantidade de turmas.'));
      }
    },
    mounted(){
      this.loadGroups();
      this.loadStudents();
      this.loadEmployeers();
    }
  }
</script>

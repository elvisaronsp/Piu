<template>
  <table class="table table-hover table-sm">
    <tbody>
      <tr>
        <th>Nome</th>
        <th>Sexo</th>
        <th v-for="s in stuffs"> {{ s }} </th>
        <th>Resultado</th>
      </tr>
      <tr v-for="row in rows">
        <td v-for="column in row" :class="cellClass(column)">{{ column }}</td>
      </tr>
    </tbody>
  </table>
</template>
<script>
  export default{
    props: ['group'],
    data(){
      return {
        student_groups: [],
        student_min_grade: 5
      }
    },
    computed:{
      stuffs: function(){
        let stuffs = [];
        if(this.student_groups.length > 0){
          for(let g in this.student_groups[0].grades){
            let stuff= this.student_groups[0].grades[g].stuff.title;
            stuffs.push(stuff);
          }
        }
        return stuffs;
      },
      rows: function(){
        let rows = [];
        if(this.student_groups.length > 0){
          for (let r in this.student_groups) {
            let resultado = false;
            let sg = this.student_groups[r];
            let row = [sg.student.name, sg.student.genre];
            for (let g in sg.grades) {
              let nota_total = sg.grades[g].nota_total;
              if(resultado !== 'REPROVADO'){
                resultado = nota_total >= this.student_min_grade? 'APROVADO':'REPROVADO';
              }
              row.push(nota_total);
            }
            row.push(resultado);
            rows.push(row);
          }
        }
        return rows;
      }
    },
    methods: {
      cellClass(column){
        if(!isNaN(column)){
          if(column < this.student_min_grade){
            return 'table-danger';
          }else{
            return 'table-success';
          }
        }
        return '';
      },
      loadData(){
        axios.get(this.$routes.grades.ata.replace(':group_id:', this.group.id))
              .then(response => {
                this.student_groups = response.data;
              })
              .catch(err => {
                showMessage('Ops! Algo errado ocorreu', err);
              });
      }
    },
    mounted(){
      this.loadData();
      this.loadOption('student_min_grade')
          .then(response => {
            if(response.data[0] != undefined){
              this.student_min_grade = this.response.data[0].valor;
            }
          }).catch(err => {
            this.student_min_grade = 5;
          });
    }
  }
</script>

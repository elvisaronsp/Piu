<template>
  <div>
    <table class="table table-sm">
      <tbody>
        <tr>
          <th>Disciplinas</th>
          <th v-for="u in units">{{ u }}</th>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
  export default{
    props: ['studentGroupId'],
    data(){
      return {
        units: [],
        data_fetched: []
      }
    },
    computed: {
      data: function(){
        /*let units_filled = false;
        let result = [];
        if(this.data.length > 0){
          for (let d in this.data) {

            let grades = data[d].grades;
            for (let g in grades) {
              if(!units_filled){
                this.units.push(grades.unit.title);
              }
              result.push()
            }
            units_filled = true;
          }
        }*/
      }
    },
    methods: {
      loadData() {
        axios.get(this.$routes.grades.boletim.replace(':student_group_id:', this.studentGroupId))
              .then(response => this.data = response.data)
              .catch(err => showMessage('Ops! Algo de errado aconteceu', err));
      }
    }
  }
</script>

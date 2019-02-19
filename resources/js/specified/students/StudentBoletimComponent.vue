<template>
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
          <img :src="logo" height="100" alt="">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
          <h5>{{ data_fetched.group.school.name }}</h5>
          <p>
            {{ address }}<br>
            Turma: {{ data_fetched.group.title }}<br>
          </p>
          <h4 class="text-center">BOLETIM {{ data_fetched.created_at | moment('YYYY') }} </h4>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
          <img :src="city_logo" height="100" alt="">
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Disciplinas</th>
            <th v-for="u in units">{{ u['título'] }}</th>
            <th>Resultado Final</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="s in data_fetched.group.stuffs">
            <td>{{ s.title }}</td>
            <td v-for="g in s.grades">{{ g.value }}</td>
            <td v-for="r in (units.length - s.grades.length)"> - </td>
            <td>{{ result(s.grades) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
  export default{
    props: ['studentGroupId'],
    data(){
      return {
        units: [],
        data_fetched: {
          created_at: '',
          group: {
            stuffs: [],
            school: {
              logo: '',
              city_logo: '',
              address: {

              }
            }
          }
        }
      }
    },
    computed: {
      logo: function(){
        if(this.data_fetched.group.school.logo !== ''){
          return this.$routes.images.show.replace(':fileName:', this.data_fetched.group.school.logo);
        }
        return '';
      },
      city_logo: function(){
        if(this.data_fetched.group.school.city_logo !== ''){
          return this.$routes.images.show.replace(':fileName:', this.data_fetched.group.school.city_logo);
        }
        return '';
      },
      address: function(){
        let address = this.data_fetched.group.school.address;
        return address.street+' '+address.number+', '+address.neighborhood+' - '+address.city+'/'+address.state;
      }
    },
    methods: {
      //Yes, i know what you are thinking...
      result(grades){
        if(grades.length > 0){
          let total = 0;
          for (let g in grades) {
            total+= parseFloat(grades[g].value);
          }
          return total / this.units.length;
        }
        return '-';
      },
      loadData() {
        let url = this.$routes.grades.boletim.replace(':student_group_id:', this.studentGroupId);
        axios.get(url)
              .then(response => this.data_fetched = response.data)
              .catch(err => showMessage('Ops! Algo de errado aconteceu', err));
        axios.get(this.$routes.units.index)
              .then(response => this.units = response.data.data)
              .catch(err => showMessage('Ops! Algo de errado aconteceu', err));
      }
    },
    mounted(){
      this.loadData();
    }
  }
</script>

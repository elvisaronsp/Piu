<template>
  <div>
    <div>
      <h3>Visualizar gráfico de rendimento</h3>
      <p class="text-muted">Acompanhe o rendimento da sua turma através de um gráfico simples e auto-explicativo.</p>  
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <v-select v-model="unit" max-height="200px" placeholder="Selecione a unidade" :options="toVSelectData(units)"></v-select>
      </div>
      <div class="col-md-12 mt-1">
        <button class="btn btn-primary" @click="chartGenerate" :disabled="disabled">Gerar gráfico</button>
      </div>
    </div>
  </div>
  
</template>
<script>
  import vSelect from 'vue-select';
  import UnitChartComponent from '../../charts/UnitChartComponent';
  export default {
    props: ['groupId'],
    components: {vSelect},
    data: function(){
      return {
        units: [],
        unit: null
      };
    },
    computed: {
      disabled: function(){
        return this.unit == null || this.groupId == null;
      }
    },
    methods: {
      loadUnits: function(){
        axios.get(this.$routes.base + '/units/')
              .then(response => this.units = response.data.data)
              .catch(err => showMessage('Ops! Algo de errado aconteceu', err))
      },
      chartGenerate: function(){
        this.$modal.show(UnitChartComponent,
          {groupId: this.groupId, unitId: this.unit.value},
          {
            draggable: true,
            classes: 'p-4 v--modal',
            height: '450px',
            width: '90%'
          }
        );
      }
    },
    mounted(){
      this.loadUnits();
    }
  }
</script>
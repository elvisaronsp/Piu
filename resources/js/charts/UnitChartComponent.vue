/*
    Gráfico com rendimento da turma em determinada unidade.
    As labels são as matérias e cada dado representado por esta label é o número de alunos
    aprovados e reprovados.
 */
<template>
    <div>
        <pulse-loader v-if="this.loading" :loading="this.loading" :color="color" :size="size"></pulse-loader>
        <div v-else class="container">
            <bar-chart-component :chart-data="datacollection" :options="options"></bar-chart-component>
        </div>
    </div>
</template>
<script>
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import BarChartComponent from './BarChartComponent';

export default {
    props: ['groupId', 'unitId'],
    components:{
        PulseLoader, BarChartComponent
    },
    data(){
        return {
          color: 'lightblue',
          size: '11px',
          fetched_data: {},
          datacollection: null,
          options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
        }
    },
    computed: {
        loading: function() {
            return this.datacollection == null;
        },
    },
    watch: {
      fetched_data: function(newValue){
        if(newValue !== undefined && newValue.length > 0){
          this.fillData();
        }
      }
    },
    methods: {
        loadData: function() {
            axios.get(this.$routes.grades.datachart.replace(':group_id:', this.groupId).replace(':unit_id:', this.unitId))
                    .then(response => (this.fetched_data = response.data));
        },
        fillData: function(){
            let aprovados = {
                               label: 'Aprovados',//this.fetched_data[i].label,
                               backgroundColor: 'lightgreen',
                               data: [],
                            };
            let reprovados = {
                               label: 'Reprovados',//this.fetched_data[i].label,
                               backgroundColor: 'red',
                               data: [],
                             };
            let labels = [];
            for(let i= 0; i < this.fetched_data.length; i++){
                aprovados.data.push(parseFloat(this.fetched_data[i].aprovados));
                reprovados.data.push(parseFloat(this.fetched_data[i].reprovados));
                labels.push(this.fetched_data[i].title);
            }
            this.datacollection = {
                labels: labels,
                datasets: [aprovados, reprovados]
            };
        }
    },
    mounted(){
        this.loadData();
        this.fillData();
    }
}
</script>

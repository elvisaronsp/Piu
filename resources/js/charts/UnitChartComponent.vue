/*
    Gráfico com rendimento da turma em determinada unidade.
    As labels são as matérias e cada dado representado por esta label é o número de alunos
    aprovados e reprovados.
 */
<template>
    <div>
        <pulse-loader v-if="this.loading" :loading="this.loading" :color="color" :size="size"></pulse-loader>
        <div v-else class="container">
            <bar-chart-component :labels="this.labels" :datasets="this.datasets"></bar-chart-component>
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
          labels: []
        }
    },
    computed: {
        loading: function() {
            return this.fetched_data.lenght <= 0;
        },
        datasets: function(){
            //let aprovados = [];
            //let reprovados = [];
            let result = [];
            for(let i= 0; i < this.fetched_data.length; i++){
                result.push({
                   label: 't',//this.fetched_data[i].label,
                   backgroundColor: 'lightblue',
                   data: [this.fetched_data[i].aprovados] ,
                });
                result.push({
                   label: 't',//this.fetched_data[i].label,
                   backgroundColor: 'red',
                   data: [this.fetched_data[i].reprovados] ,
                });
                this.labels.push(this.fetched_data[i].title);
            }
            return result;
        },
    },
    methods: {
        loadData: function() {
            axios.get(this.$routes.grades.datachart.replace(':group_id:', this.groupId).replace(':unit_id:', this.unitId))
                    .then(response => (this.fetched_data = response.data));
        }
    },
    mounted(){
        this.loadData();
    }
}
</script>

/*
    Gráfico com rendimento da turma em determinada unidade. 
    As labels são as matérias e cada dado representado por esta label é o número de alunos
    aprovados e reprovados.
 */
<template>
    <div>
        <pulse-loader v-if="this.loading" :loading="this.loading" :color="color" :size="size"></pulse-loader>
        <div v-else class="container">
            <!--<bar-chart-component :labels="this.labels" :datasets="this.datasets"></bar-chart-component>-->
        </div>
    </div>
</template>
<script>
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import BarChartComponent from './BarChartComponent';

export default {
    props: ['groupId'],
    components:{
        PulseLoader, BarChartComponent
    },
    data(){
        return {
          color: 'lightblue',
          size: '11px',
          datachart: {}
        }
    }, 
    computed: {
        loading: function() {
            //return Object.keys(this.datasets).length <= 0;
            return false;
        },
        /*datasets: function(){
            let result = [];
            for(let i=0; i < this.datachart.length; i++){
                result.push({
                   label: this.datachart[i].label,
                   backgroundColor: this.$colors.units[i],
                   data: this.datachart[i].notas.split(','),
                   fill: false
                })
            }
            return result; //TODO: Função para listar as notas e relacionar com o label correspondente.
        },*/
    },
    methods: {
        /*loadData: function() {
            axios.get(this.$routes.grades.datachart.replace(':student_group_id:', this.studentGroupId))
                    .then(response => (this.datachart = response.data));
        },
        labels: function(data){
            let ls= [];
            for (let i = 0; i < this.datachart.data.length; i++) {
                ls.push('Nota '+i);
            }              
            console.log(ls);
            return ls;
        }*/
    },
    watch:{
        groupId: function(newValue){
            console.log(newValue);
        }
    },
    mounted(){
        //this.loadData();
        console.log(this.groupId);
    }
}
</script>


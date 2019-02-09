<template>
    <div>
        <pulse-loader v-if="this.loading" :loading="this.loading" :color="color" :size="size"></pulse-loader>
        <line-chart-component v-else :labels="this.labels" :datasets="this.datasets"></line-chart-component>
    </div>
</template>
<script>
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';

export default {
    props: ['studentGroupId'],
    components:{
        PulseLoader
    },
    data(){
        return {
          color: 'lightblue',
          size: '11px',
          units: {},
          grades: {}
        }
    }, 
    computed: {
        loading: function() {
            return Object.keys(this.units).length <= 0 || Object.keys(this.grades).length <= 0;
        },
        labels: function(){
            if(!this.units == ''){
                return Object.values(this.units);
            }
            return false;
        },
        datasets: function(){
           return false; //TODO: Função para listar as notas e relacionar com o label correspondente.
        }
    },
    watch: {
       units: function(newValue){
         console.log(newValue);
       },
       labels: function(newValue){
         console.log(newValue);
       }
    },
    methods: {
        loadData: function() {
            axios.get(this.$routes.units.index)
                    .then(response => (this.units = response.data.data));
            axios.get(this.$routes.grades.index)
                    .then(response => (this.grades = response.data.data));
        }
    },
    mounted(){
        console.log( + ' Largura');
        this.loadData();
    }
}
</script>


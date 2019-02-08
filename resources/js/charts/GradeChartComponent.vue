<template>
    <div>
        <pulse-loader v-if="loading" :loading="loading" :color="color" :size="size"></pulse-loader>
        <line-chart-component v-else :labels="labels" :datasets="datasets"></line-chart-component>
    </div>
</template>
<script>
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';

export default {
    props: ['studentGroupId'],
    components:{
        PulseLoader
    },
    data: () => ({
        color: 'lightblue',
        size: '11px',
        units: '',
        grades: ''
    }), 
    computed: {
        loading: function() {
            return this.labels == '' && this.datasets == '';
        },
        labels: function(){
            if(!this.units == ''){
                return Object.values(this.units);
            }
            return false;
        },
        datasets: function(){
            //TODO: Função para listar as notas e relacionar com o label correspondente.
        }
    },
    methods: {
        loadData: () => {
            axios.get(this.$routes.unit.index)
                    .then(response => (this.units = response.data.data));
            axios.get(this.$routes.grades.index)
                    .then(response => (this.grades = response.data.data));
        }
    },
    mounted(){
        this.loadData();
    }
}
</script>


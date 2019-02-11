<script>
    import { Bar } from 'vue-chartjs';
    export default {
        extends: Bar,
        props: ['datasets', 'labels', 'styles'],
        data() {
            return {
                chartData: {
                    dataCollection: {
                        labels: this.labels,
                        datasets: this.datasets
                    }
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            };
        },
        watch: {
          datasets: function(newValue){
            this.loadData();
          },
          labels: function(newValue){
            this.loadData();
          }
        },
        methods:{
          loadData(){
            this.renderChart(this.chartData.dataCollection, this.options);
          }
        },
        mounted(){
            this.loadData();
        }
    }
</script>

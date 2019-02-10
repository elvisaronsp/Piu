<script>
    import { Bar } from 'vue-chartjs';
    export default {
        extends: Bar,
        props: ['datasets', 'labels', 'styles'],
        data() {
            return {
                chartData: {
                    dataCollection: {
                        labels: '',
                        datasets: this.datasets
                    }
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            };
        },
        mounted(){
            this.renderChart(this.chartData.dataCollection, this.options);
        }
    }
</script>
<script>
    import { Line } from 'vue-chartjs';
    export default {
        extends: Line,
        props: ['datasets', 'labels', 'styles'],
        data() {
            return {
                chartData: {
                    dataCollection: {
                        labels: this.labels,
                        datasets: this.datasets //this.datasets
                                /*[{
                                    label: 'Primeira informação',
                                    backgroundColor: 'red',
                                    data: [33, 44, 54, 55]
                                }]*/
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
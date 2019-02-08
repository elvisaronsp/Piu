<script>
    import { Line } from 'vue-chartjs';
    export default {
        extends: Line,
        props: ['labels', 'datasets'],
        data: () => {
            return {
                chartData: {
                    datacollection: {
                        labels: labels,
                        datasets: datasets
                        /*[{
                            label: 'Primeira informação',
                            backgroundColor: 'red',
                            data: [40, 20]
                        }]*/
                    }
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true
                }
            };
        },
        mounted(){
            this.renderChart(this.chartData.datacollection, this.options);
        }
    }
</script>
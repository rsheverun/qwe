<template>
    <div class="chart" v-if="data.labels.length != 0">
        <div>
            <div >
                <bar-chart :chart-data="data" :height="200"  :options="options"></bar-chart>
            
            </div>
        </div>
    </div>

</template>
<script>
import BarChart from './BarChart.js'
    export default {
        components: {
            BarChart 
        },
        data : function(){
            return{
                data: [],
                options: {
                    responsive: true,
                    barValueSpacing: 2,
                    maintainAspectRatio: false,
                     legend: {
                        display: false
                    }, 
                    scales: {
                        xAxes: [
                            {
                                gridLines: {
                                    display:false,
                                    drawBorder:false
                                }
                            }
                        ], 
                        yAxes: [
                            { 
                            ticks: { 
                                    beginAtZero:true ,
                                    stepSize:1,
                                    display:false,
                            },
                            gridLines: {
                                    display:false,
                                    drawBorder:false
                                }   
                            }],
                            
                    }, 
                } 
            
            }
        },
        mounted() {
            this.update()

            
        },
        methods: {
            update: function() {
                let url = new URL(window.location.href)
                axios.get('/dashboard/chart-data'+url.search).then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>

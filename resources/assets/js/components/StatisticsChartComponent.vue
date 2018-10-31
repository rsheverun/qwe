<template>
    <div class="chart">
        <div>
            <div class="" v-if="data.labels.length != 0">
                <bar-chart :chart-data="data" :height="100" :options="options"></bar-chart>
            
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
                    console.log(this.data.labels.length)
                });
            }
        }
    }
</script>
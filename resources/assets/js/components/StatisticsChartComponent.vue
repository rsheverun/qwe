<template>
    <div class="chart">
        <div>
            <div class="">
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
                axios.get('../dashboard/chart-data').then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>
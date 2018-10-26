<template>
    <div class="chart">
        <div>
            <div class="">
                <bar-chart v-if="data != 0 " :chart-data="data" :height="100" :options="options"></bar-chart>
            
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
                let url = new URL(window.location.href)
                console.log(url)
                axios.get('/dashboard/chart-data'+url.search).then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>
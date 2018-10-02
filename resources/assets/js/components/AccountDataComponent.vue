<template>
<div>
    <div class="form-group row">
        <div class="col-lg-7">
            <label for="staticEmail" class="title" id="date_label">date range:</label>
            <input type="date" id="date_from" class="filter ml-lg-3 mr-3"  v-model="start_date" required>
            <input type="date" id="date_to" class="filter" v-model="end_date" required>
        </div>
    </div>
    <div class="table-responsive">
        <table class="huntingarea-table">
            <thead>
                <tr>
                    <th scope="col" >Day</th>
                    <th scope="col">camera</th>
                    <th scope="col">number of images</th>
                    <th scope="col">transfer in mb</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10.08.2018 18:44:11</td>
                    <td>mhA001 - Cam at Rosis house</td>
                    <td>56</td>
                    <td>Lorem ipsum</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row col">
        <span class="sum pr-1">Sum per month: </span> <span class="sum number">112</span>
    </div>
</div>
</template>

<script>
    export default {
        props: ['cam'],
        data () {
            return {
            data: [],
            start_date: '',
            end_date: ''
            
            }
        },
      
        mounted() {
           this.getItems(),
           console.log(start_date);
        },
        methods: {
           getItems: function() {
                this.text = 'hide images'
                axios.get('../account/show/' + this.cam.id).then((response) => {
                    this.data = response.data
                    
                });
            
            },
            
        
        }
    }
</script>

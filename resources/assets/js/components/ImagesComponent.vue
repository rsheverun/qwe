<template>
<div class="container-fluid" v-if="count.length > 3">
    <div class="row" >

        <div class="col-lg-4 col-xs-12"   v-for="(item, index) in data" v-if="index > 2">
            <div class="text-center" >
                <img v-bind:src="item.bild"  class="zoom zoom-absolute img-fluid w-100" @error="item.id">
            </div>
            <div class="text-right">
                <span>{{moment(item.datum).format('DD.MM.YYYY HH:mm:ss')}}</span>
            </div>
        </div>
    </div>
   <div class="row text-right" v-if="count.length > 3">
            <div class="col-12">
                <button @click="update" type="button" id="btn_all_img" class="btn btn-outline-success button-look btn-green btn-details" >{{text}}</button>
            </div>
        </div>
</div>
<div class="container-fluid" v-else-if="count.length == 0">
    <p class="text-center label-cam">
        No data available
    </p>
</div>
</template>

<script>
    export default {
        props: ['cam'],
        data () {
            return {
            data: [],
            count: [],
            text: 'show all images'
            }
        },
      
        mounted() {
            axios.get('../show_all/' + this.cam.id).then((response) => {
                    this.count = _.orderBy(response.data, 'datum','desc')
                });
                console.log(window.location.pathname);
        },
        methods: {
           update: function() {
            if(this.text != 'hide images'){
                this.text = 'hide images'
                axios.get('../show_all/' + this.cam.id).then((response) => {
                    this.data = _.orderBy(response.data, 'datum','desc')
                });
            }else{
                this.text= 'show all images'
                this.data = null
            }
            },
            
        
        }
    }
</script>

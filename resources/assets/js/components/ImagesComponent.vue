<template>
<div class="container-fluid">
    <div class="row" >

        <div class="col-lg-4 col-xs-12" v-for="(item, index) in data" v-if="index > 2">
            <div class="text-center" >
                <img v-bind:src="'http://127.0.0.1:8000' + item.bild"  class="zoom img-fluid w-100" alt="">
            </div>
            <div class="text-right">
                <span>{{ item.created_at}}</span>
            </div>
        </div>
    </div>
   <div class="row text-right">
            <div class="col-12">
                <button @click="update" type="button" id="btn_all_img" class="btn btn-outline-success button-look btn-green btn-details" >{{text}}</button>
            </div>
        </div>
</div>
</template>

<script>
    export default {
        props: ['cam'],
        data () {
            return {
            data: [],
            text: 'show all images'
            }
        },
      
        mounted() {
           
        },
        methods: {
           update: function() {
            if(this.text != 'hide images'){
                this.text = 'hide images'
                axios.get('../show_all/' + this.cam.id).then((response) => {
                    this.data = response.data
                    
                });
            }else{
                this.text= 'show all images'
                this.data = null
            }
            },
            
        
        }
    }
</script>

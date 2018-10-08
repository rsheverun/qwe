<template>
<div class="comment">
     <span class="name">as </span>
     <span class="msg">asdsa</span>
 </div>
 
</template>

<script>
    export default {
        props: ['cam'],
        data () {
            return {
            data: [],
            }
        },
      
        mounted() {
           this.getComments();
        },
        methods: {
           getComments: function() {
                    axios.get('../image/' + this.cam.id + '/comments').then((response) => {
                    this.data = response.data
                    
                });
            },
            
        
        }
    }
</script>

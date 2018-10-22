<template>
<div>
    <div class="comment" >
        <div class="pb-2" v-for="item in data">
           <div class="w-100">
               <span class="name"> {{item.user.first_name}}  {{item.user.last_name }}, </span>
               <span class="comment-date"> {{moment(item.created_at).format('DD.MM.YYYY HH:mm:ss')}}</span>
            </div> 
            <span class="msg">{{item.text}}</span>
        </div>     
    </div>
    <input type="textarea" class="comment-text" placeholder="Write a message here..." @keyup.enter="addComent" v-model="text" name="text">
</div>
</template>

<script>

    export default {
        props: ['cam'],
        data () {
            return {
            data: [],
            text: '',
            }
        },
      
        mounted() {
           this.getComments();
        },

        methods: {
           getComments: function() {
                axios.get('../dashboard/image/'+ this.cam.id+ '/comments/' ).then((response) => {
                    this.data = response.data
                });
            },
            addComent: function() {
                var _this = this;
                axios.post('../dashboard/addcomment/'+ this.cam.id, {
                    text: _this.text
                }).then((response) => {
                     _this.getComments()
                     this.text = ''
                });
            }
        }
    }
</script>

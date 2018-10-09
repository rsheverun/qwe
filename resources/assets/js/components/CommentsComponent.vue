<template>
<div>
    <div class="comment" >
        <div v-for="item in data">
            <span class="name"> {{item.user.first_name}}  {{item.user.last_name }}, {{item.created_at}}</span>
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
                console.log(_this.text);
                axios.post('../dashboard/images/'+ this.cam.id+ '/comment/', {
                    text: _this.text
                }).then((response) => {
                     _this.getComments()
                     this.text = ''
                });
            }
        }
    }
</script>

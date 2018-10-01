
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
require('./custom');

window.Vue = require('vue');
Vue.use(require('vue-moment'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('chartpie-component', require('./components/ChartpieComponent.vue'));
// Vue.component('chartline-component', require('./components/ChartlineComponent.vue'));
Vue.component('images-component', require('./components/ImagesComponent.vue'));

// var app = new Vue({
    
//     el: '#app',
//     data: {
//       items: []
//      },
//      http: {
//       root: '/root',
//       headers: {
//           'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
//       }
//   },

//     mounted: function mounted() {
//       this.getItems();
      
      
//     },
//     methods: {
//       getItems: function getItems() {
//         var _this = this;
//         // axios.get('/show_all/').then(function (response) {
//         //   console.log(response.data);

//         //   _this.items = response.data.data;
          
//         // });
//         // console.log(_this.items);
//       },

//     //   setVal(val_id, val_name, val_desc) {
//     //       this.e_id = val_id;
//     //       this.e_name = val_name;
//     //       this.e_desc = val_desc;
          
//     //   },
  
//       createItem: function createItem() {
//         var _this = this;
//         var input = this.newItem;
//         _this.hasUnique = true;
//         _this.hasError = true;
//         _this.items.forEach (function(e){
//           if(e.name == input['area_name']) {
//             _this.hasUnique = false;
//           }
//         });

//         if (input['area_name'] == '' || input['area_desc'] == '' ) {
//             this.hasError = false;
//         } else if(_this.hasUnique == true){
//           this.hasUnique = true;
//             this.hasError = true;

//           axios.post('/dashboard/store/area', input).then(function (response) {
//             _this.newItem = { 'area_name': '', 'area_desc': '',   };
//             _this.getItems();
//           });
//         }
//       },
 
//       deleteItem: function deleteItem(item) {
//         var _this = this;
//         axios.post('/deleteitem/' + item.id).then(function (response) {
//           _this.getItems();
//           _this.hasError = true, 
//           _this.hasDeleted = false
          
//         });
//       }
//     }
//   });

  var iamges = new Vue({
    el: '#images',

});

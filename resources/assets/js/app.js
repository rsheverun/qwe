
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('chartpie-component', require('./components/ChartpieComponent.vue'));
// Vue.component('chartline-component', require('./components/ChartlineComponent.vue'));
var app = new Vue({
    
    el: '#app',
  
    data: {

      newItem: { 'area_name': '','area_desc': '', 'hunting_area': '' },
      items: []
     },
    mounted: function mounted() {
      this.getItems();
    },
    methods: {
      getItems: function getItems() {
        var _this = this;
  
        axios.get('/getarea').then(function (response) {
          _this.items = response.data;
          
        });
      },
    //   setVal(val_id, val_name, val_desc) {
    //       this.e_id = val_id;
    //       this.e_name = val_name;
    //       this.e_desc = val_desc;
          
    //   },
  
      createItem: function createItem() {
        var _this = this;
        var input = this.newItem;
        if (input['area_name'] == '' || input['area_desc'] == '' ) {
          this.hasError = false;
        } else {
          this.hasError = true;
          axios.post('/dashboard/settings', input).then(function (response) {
            _this.newItem = { 'area_name': '', 'area_desc': '',   };
            _this.getItems();
          });
        }
      },
 
      deleteItem: function deleteItem(item) {
        var _this = this;
        axios.post('/deleteitem/' + item.id).then(function (response) {
          _this.getItems();
          _this.hasError = true, 
          _this.hasDeleted = false
          
        });
      }
    }
  });

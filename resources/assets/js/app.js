
import $ from 'jquery';  
window.jQuery = $; 
window.$ = $;



require('./bootstrap');
require('./custom');

window.Vue = require('vue');
import moment from 'moment'
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import VueCharts from 'vue-chartjs'
import { Bar, Line } from 'vue-chartjs'
Vue.use(BootstrapVue);
Vue.prototype.moment = moment

var datepicker = require('air-datepicker');


Vue.component('chart-component', require('./components/StatisticsChartComponent.vue'));
Vue.component('images-component', require('./components/ImagesComponent.vue'));
Vue.component('account-data', require('./components/AccountDataComponent.vue'));
Vue.component('comments', require('./components/CommentsComponent.vue'));



var iamges = new Vue({
    el: '#images',
});
var account_data = new Vue({
  el: '#account_data',
});

var comments = new Vue({
  el: '#comments-data',
});
var chart = new Vue({
  el: '#chart-component',
});




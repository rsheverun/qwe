
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./custom');

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment'
import VueCharts from 'vue-chartjs'
import { Bar, Line } from 'vue-chartjs'
Vue.prototype.moment = moment
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
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


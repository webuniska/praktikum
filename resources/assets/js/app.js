/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
// require('jquery');
// require('./custom/vendors/jquery/dist/jquery.min');
// require('./custom/jquery-3.3.1');
require('./custom/vendors/bootstrap/dist/js/bootstrap.min');
require('./custom/vendors/fastclick/lib/fastclick');
require('./custom/vendors/nprogress/nprogress');
require('./custom/vendors/Chart.js/dist/Chart.min');
require('./custom/vendors/gauge.js/dist/gauge.min');
require('./custom/vendors/bootstrap-progressbar/bootstrap-progressbar.min');
require('./custom/vendors/iCheck/icheck.min');
require('./custom/vendors/skycons/skycons');
require('./custom/custom');

// require('./custom/vendors/jqvmap/dist/jquery.vmap');
// require('./custom/vendors/jqvmap/dist/maps/jquery.vmap.world');
// require('./custom/vendors/jqvmap/examples/js/jquery.vmap.sampledata');
// require('./custom/vendors/Flot/jquery.flot');
// require('./custom/vendors/Flot/jquery.flot.pie');
// require('./custom/vendors/Flot/jquery.flot.time');
// require('./custom/vendors/Flot/jquery.flot.stack');
// require('./custom/vendors/Flot/jquery.flot.resize');
// require('./custom/vendors/flot.orderbars/js/jquery.flot.orderBars');
// require('./custom/vendors/flot-spline/js/jquery.flot.spline.min');
// require('./custom/vendors/flot.curvedlines/curvedLines');
// require('./custom/vendors/DateJS/build/date');
// require('./custom/vendors/moment/min/moment.min');
// require('./custom/vendors/bootstrap-daterangepicker/jsdaterangepicker');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import vuetify from './vuetify';
import Form from './Form';
import Vue2Editor from "vue2-editor";
import Vue from 'vue';
import firebase from "firebase";
import VueRouter from 'vue-router'
import VueTheMask from 'vue-the-mask'

Vue.use(VueRouter)
Vue.use(VueTheMask)

var firebaseConfig = {
    apiKey: "AIzaSyBY_EkrAnosWunYNj2_BUBUmUOQWsHV57o",
    authDomain: "myway-86cfb.firebaseapp.com",
    projectId: "myway-86cfb",
    storageBucket: "myway-86cfb.appspot.com",
    messagingSenderId: "1081725891057",
    appId: "1:1081725891057:web:5d8ff3ddfaab6fee49d450",
    measurementId: "G-7MHJE0CSZR"
};

firebase.initializeApp(firebaseConfig);
firebase.analytics();
 
window.Form =Form;
Vue.use(Vue2Editor);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/** Editable component */
Vue.component('editable-component', require('./components/editable/EditableComponent.vue').default);

/** Navigation component */
Vue.component('nav-component', require('./components/NavComponent.vue').default);

/** Form components */
Vue.component('wizard-component', require('./components/WizardComponent.vue').default);
Vue.component('wizard2-component', require('./components/Wizard2Component.vue').default);

/** Header components */
Vue.component('header1-component', require('./components/headers/Header1Component.vue').default);
Vue.component('header2-component', require('./components/headers/Header2Component.vue').default);
Vue.component('header3-component', require('./components/headers/Header3Component.vue').default);
Vue.component('header4-component', require('./components/headers/Header4Component.vue').default);
Vue.component('header5-component', require('./components/headers/Header5Component.vue').default);

/** Project component */
Vue.component('project1-component', require('./components/projects/Project1Component.vue').default);
Vue.component('project2-component', require('./components/projects/Project2Component.vue').default);

/** Images component */
Vue.component('images1-component', require('./components/images/Images1Component.vue').default);
Vue.component('images2-component', require('./components/images/Images2Component.vue').default);

/** Contact component */
Vue.component('contact1-component', require('./components/contact/Contact1Component.vue').default);
Vue.component('contact2-component', require('./components/contact/Contact2Component.vue').default);

/** Search component */
Vue.component('search-component', require('./components/search/SearchComponent.vue').default);
Vue.component('portfolios-component', require('./components/search/PortfoliosComponent.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify,
});


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('login', require('./components/LoginComponent.vue'));

import LoginComponent from './forms/LoginComponent';
import AddressComponent from './forms/AddressComponent';
import SchoolComponent from './forms/SchoolComponent';
import UserComponent from './forms/UserComponent';
import ErrorComponent from './forms/ErrorComponent';
import VocationComponent from './forms/VocationComponent';
import EmployeerDataComponent from './forms/EmployeerDataComponent';
import ButtonBarComponent from './components/ButtonBarComponent';
import SelectAjaxComponent from './forms/elements/SelectAjaxComponent';
import BirthComponent from './forms/BirthComponent';
import GeneralRegistrationComponent from './forms/GeneralRegistrationComponent';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
                  LoginComponent, AddressComponent, SchoolComponent, UserComponent,
                  ErrorComponent, EmployeerDataComponent, ButtonBarComponent, SelectAjaxComponent,
                  BirthComponent, GeneralRegistrationComponent
                },

});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    )
);
import "./filters";
import "./entitiesModals";
import "./routes";
import "./mixins";
import "./colors";

import VModal from "vue-js-modal";
import VueTheMask from "vue-the-mask";
import StudentGroupComponent from "./forms/StudentGroupComponent";
import StudentTransferComponent from "./forms/StudentTransferComponent";
import VueMoment from "vue-moment";
import Feather from "vue-feather";
import store from "./store";
import Vuex from "vuex";

Vue.use(Vuex);
Vue.use(Feather);
Vue.use(VueMoment);
Vue.use(VueTheMask);
Vue.use(VModal, { dynamic: true, injectModalsContainer: true });

Vue.prototype.$csrf = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

Vue.prototype.$table_custom = {
    students: [
        {
            type: "success",
            title: "Matricular em uma turma",
            icon: "plus-circle",
            click: function(id) {
                app.$modal.show(
                    StudentGroupComponent,
                    {
                        entityId: id
                    },
                    {
                        draggable: true,
                        classes: "p-4 v--modal",
                        width: "600",
                        height: "auto"
                    }
                );
            }
        },
        {
            type: "warning",
            title: "Transferir para outra instituição de ensino",
            icon: "repeat",
            click: function(id) {
                app.$modal.show(
                    StudentTransferComponent,
                    {
                        entityId: id
                    },
                    {
                        draggable: true,
                        classes: "p-4 v--modal",
                        width: "600",
                        height: "auto"
                    }
                );
            }
        }
    ]
};

/**
 *  Next, we will create a fresh Vue application instance and attach it to
 *  the page. Then, you may begin adding components to this application
 *  or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    store
});

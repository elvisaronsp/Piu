import Vuex from "vuex";
import Vue from "vue";
import "./routes";

const app = new Vue({});
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        employeers: [],
        students: [],
        groups: [],
        stuffs: [],
        options: [],
        //grades: [],
        disabled_register: true
    },
    mutations: {
        search(state, data) {
            data.loading(true);
            axios
                .get(
                    "/search/"
                        .concat(data.entity)
                        .concat("/")
                        .concat(data.search)
                )
                .then(response => {
                    state[data.entity] = response.data;
                    data.loading(false);
                })
                .catch(err => {
                    console.log("Erro em consulta de pesquisa.");
                    data.loading(false);
                });
        }
    }
});

export default store;

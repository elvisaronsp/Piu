import Vue from "vue";
const app = new Vue({});

Vue.mixin({
    mounted(){
      this.loadOldInputs();
    },
    data() {
      return {
        states: [
          { value: "AC", text: "Acre" },
          { value: "AL", text: "Alagoas" },
          { value: "AP", text: "Amapá" },
          { value: "AM", text: "Amazonas" },
          { value: "BA", text: "Bahia" },
          { value: "CE", text: "Ceará" },
          { value: "DF", text: "Distrito Federal" },
          { value: "ES", text: "Espírito Santo" },
          { value: "GO", text: "Goiás" },
          { value: "MA", text: "Maranhão" },
          { value: "MT", text: "Mato Grosso" },
          { value: "MS", text: "Mato Grosso do Sul" },
          { value: "MG", text: "Minas Gerais" },
          { value: "PA", text: "Pará" },
          { value: "PB", text: "Paraíba" },
          { value: "PR", text: "Paraná" },
          { value: "PE", text: "Pernambuco" },
          { value: "PI", text: "Piauí" },
          { value: "RJ", text: "Rio de Janeiro" },
          { value: "RN", text: "Rio Grande do Norte" },
          { value: "RS", text: "Rio Grande do Sul" },
          { value: "RO", text: "Rondônia" },
          { value: "RR", text: "Roraima" },
          { value: "SC", text: "Santa Catarina" },
          { value: "SP", text: "São Paulo" },
          { value: "SE", text: "Sergipe" },
          { value: "TO", text: "Tocantins" }
        ]
      }
    },
    methods: {
        loadOldInputs(){
          let data = this.$data;
          let old = this.old;
          Object.keys(data).forEach(function(element, index, array){
            if( typeof(data[element]) == 'string'  && data[element] == ''){
                data[element] = old(element);
            }
          });
        },
        print(){
          window.print();
        },
        old(key){
          return old[key] == undefined? '' : old[key];
        },
        toVSelectData(data) {
            let result = [];
            if (data !== undefined) {
                data.forEach((item, key) => {
                    if (item["título"] !== undefined) {
                        result.push({ label: item["título"], value: item.id });
                    } else if (item.name !== undefined) {
                        result.push({ label: item.name, value: item.id });
                    } else if (item.title !== undefined) {
                        result.push({ label: item.title, value: item.id });
                    }
                });
            }
            return result;
        },
        loadOption(n) {
            return axios.get(this.$routes.options.index + "?name=" + n);
        },
        saveOption(n, v) {
            return axios
                .post(this.$routes.options.store, {
                    _token: this.$csrf,
                    name: n,
                    value: v
                })
                .catch(err => {
                    axios.post(
                        this.$routes.options.update.replace(":name:", n),
                        {
                            value: v,
                            _token: this.$csrf
                        }
                    );
                });
        },
        showMessage(title, message) {
            app.$modal.show("dialog", {
                title: title,
                text: message,
                buttons: [
                    {
                        title: "Entendi"
                    }
                ]
            });
        }
    }
});

import Vue from "vue";
const app = new Vue({});

Vue.mixin({
    mounted(){
      let data = this.$data;
      let old = this.old;
      Object.keys(data).forEach(function(element, index, array){
        if( typeof(data[element]) == 'string' ){
            data[element] = old(element);
        }
      });
    },
    methods: {
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

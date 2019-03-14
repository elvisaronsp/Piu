import Vue from 'vue';
const app = new Vue({});

Vue.mixin({
  methods: {
    toVSelectData(data){
      let result = [];
      if(data !== undefined){
        data.forEach((item, key) => result.push({label: item["título"], value: item.id}));
      }
      return result;
    },
    loadOption(n) {
        return axios.get(this.$routes.options.index+'?name='+n);
    },
    saveOption(n, v) {
        return axios.post(this.$routes.options.store, {
          _token: this.$csrf,
          name: n,
          value: v
        }).catch(err => {
          axios.post(this.$routes.options.update.replace(':name:', n), {
            value: v,
            _token: this.$csrf
          })
        });
    },
    showMessage(title, message){
      app.$modal.show('dialog', {
        title: title,
        text: message,
        buttons: [
          {
            title: 'Entendi'
          }
       ]
      });
    }
  }
});

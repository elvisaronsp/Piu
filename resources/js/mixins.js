import Vue from 'vue';
const app = new Vue({});

Vue.mixin({
  methods: {
    toVSelectData(data){
      let result = [];
      console.log(data);
      if(data !== undefined){
        data.forEach((item, key) => result.push({label: item["título"], value: item.id}));
      }
      return result;
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
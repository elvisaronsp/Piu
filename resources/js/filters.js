import Vue from 'vue';
import ptBR from './lang/ptBR.js'

Vue.filter('title', r => {
  if(r.title !== undefined){
    return r.title;
  }else if(r.name !== undefined){
    return r.name;
  }else if(r.título){
    return r.título;
  }else if(r.nome){
    return r.nome;
  }
  return 'Title not found!';
});

Vue.filter('extractKey', obj => {
  return Object.keys(obj)[0];
});

Vue.filter('translate', obj => {
  let arr = Object.keys(ptBR);
  let result = obj;
  for (let s in arr) {
    result = obj.replace( arr[s], ptBR[ arr[s] ] );
  }
  return result;
})

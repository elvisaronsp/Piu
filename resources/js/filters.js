import Vue from 'vue';

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

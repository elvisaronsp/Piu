<template>
  <div class="row">
    <div class="col-md-6">
      <label>Nome</label>
      <input class="form-control" placeholder="Chave de representação do valor" v-model="name" name="name" required>
    </div>
    <div class="col-md-6">
      <label>Valor<label>
      <input class="form-control" placeholder="Chave de representação do valor" v-model="label" name="value" required>
    </div>
  </div>
</template>
<script>
  export class {
    data(){
      return {
        name: '',
        value: ''
      }
    }
  }
</script>
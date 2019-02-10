<template>
  <div class="row">
    <div class="col-md-6 form-group">
      <label>Nome</label>
      <input class="form-control" placeholder="Chave de representação do valor" v-model="name" name="name" required>
    </div>
    <div class="col-md-6 form-group">
      <label>Valor</label>
      <input class="form-control" placeholder="Digite o valor" v-model="value" name="value" required>
    </div>
  </div>
</template>
<script>
  export default {
    data(){
      return {
        name: '',
        value: ''
      }
    }
  }
</script>

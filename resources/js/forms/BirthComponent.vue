<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4">Certidão de nascimento</h1>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="book">Livro</label>
        <input class="form-control" type="text" name="book" v-model="book">
      </div>
      <div class="form-group col-md-8">
        <label for="birth_number">Número da certidão</label>
        <input class="form-control" type="text" name="birth_number" v-model="birth_number">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-3">
        <label for="leaf">Folha</label>
        <input class="form-control" type="number" name="leaf" v-model="leaf">
      </div>
      <div class="form-group col-md-4">
        <label for="term">Termo</label>
        <input class="form-control" type="text" name="term" v-model="term">
      </div>
      <div class="form-group col-md-4">
        <label for="emission">Emissão</label>
        <input class="form-control" type="date" name="birth_emission" v-model="birth_emission">
      </div>
    </div>
  </div>
</template>
<script>
export default {
    data(){
      return {
        book: '',
        birth_number: '',
        leaf: '',
        term: '',
        birth_emission: ''
      }
    }
}
</script>

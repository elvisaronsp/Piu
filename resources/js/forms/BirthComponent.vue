<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4">Certidão de nascimento</h1>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="book">Livro</label>
        <input type="text" name="book" v-model="book">
      </div>
      <div class="form-group col-md-8">
        <label for="birth_number">Número da certidão</label>
        <input type="text" name="birth_number" v-model="birth_number">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-3">
        <label for="leaf">Folha</label>
        <input type="number" name="leaf" v-model="leaf">
      </div>
      <div class="form-group col-md-4">
        <label for="term">Termo</label>
        <input type="text" name="termo" v-model="term">
      </div>
      <div class="form-group col-md-4">
        <label for="emission">Emissão</label>
        <input type="date" name="emission" v-model="emission">
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
        emission: ''
      }
    }
}
</script>

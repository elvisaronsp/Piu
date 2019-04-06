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
        <input class="form-control" type="text" name="book" v-model="book" placeholder="Informe o livro da certidão" required>
      </div>
      <div class="form-group col-md-8">
        <label for="birth_number">Número da certidão</label>
        <input class="form-control" type="text" name="birth_number" v-model="birthNumber" placeholder="Informe o número da certidão" :disabled="term.length > 0">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-3">
        <label for="leaf">Folha</label>
        <input class="form-control" type="text" name="leaf" v-model="leaf" placeholder="Informe a folha" required>
      </div>
      <div class="form-group col-md-4">
        <label for="term">Termo</label>
        <input class="form-control" type="text" name="term" v-model="term" placeholder="Informe o termo da certidão" :disabled="birthNumber.length > 0">
      </div>
      <div class="form-group col-md-4">
        <label for="emission">Data de emissão</label>
        <input class="form-control" type="date" name="birth_emission" v-model="birthEmission" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Cidade da emissão</label>
        <input class="form-control" type="text" name="emission_city" v-model="emissionCity" placeholder="Digite a cidade de emissão" required>
      </div>
      <div class="form-group col-md-6">
        <label>Estado da emissão</label>
        <select class="form-control" name="emission_state" v-model="emissionState" required>
          <option value="">Selecione o estado...</option>
          <option v-bind:value="state.value" v-for="state in states">{{ state.text }}</option>
        </select>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props:['birth'],
    mounted() {
      let birth = this.birth;
      if(birth){
        this.book = birth.book;
        this.birthNumber = birth.birth_number;
        this.leaf = birth.leaf;
        this.term = birth.term;
        this.birthEmission = birth.birth_emission;
        this.emissionCity = birth.emission_city;
        this.emissionState = birth.emission_state;
      }
    },
    data(){
      return {
        book: '',
        birthNumber: '',
        leaf: '',
        term: '',
        birthEmission: '',
        emissionCity: '',
        emissionState: ''
      }
    }
}
</script>

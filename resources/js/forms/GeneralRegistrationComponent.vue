<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4">Informações pessoais</h1>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="registration_number">RG</label>
        <input class="form-control" type="text" name="registration_number" v-model="registration_number" required>
      </div>
      <div class="form-group col-md-4">
        <label for="emitter">Orgão emissor</label>
        <input class="form-control" type="text" name="emitter" v-model="emitter" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="emission">Data de emissão</label>
        <input class="form-control" type="date" name="registration_emission" v-model="registration_emission" required>
      </div>
      <div class="form-group col-md-6">
        <label for="cpf">CPF</label>
        <input class="form-control" type="text" name="cpf" v-model="cpf" required>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      registration_number: '',
      emitter: '',
      registration_emission: '',
      cpf: '',
    }
  }
}
</script>

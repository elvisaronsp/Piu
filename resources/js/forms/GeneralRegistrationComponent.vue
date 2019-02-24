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
        <input class="form-control" type="text" name="registration_number" placeholder="Digite o RG" v-model="registration_number" required>
      </div>
      <div class="form-group col-md-3">
        <label for="emitter">Orgão emissor</label>
        <input class="form-control" type="text" name="emitter" v-model="emitter" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="emission">Data de emissão</label>
        <input class="form-control" type="date" name="registration_emission" v-model="registration_emission" required>
      </div>
      <div class="form-group col-md-4">
        <label for="cpf">CPF</label>
        <the-mask class="form-control" placeholder="Digite o CPF" :mask="['###.###.###-##']" v-model="cpf" required/>
        <input type="hidden" name="cpf" :value="cpf">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['generalRegistration'],
  mounted() {
    let gr = this.generalRegistration;
    if(gr){
      this.registration_number = gr.registration_number;
      this.emitter = gr.emitter;
      this.registration_emission = gr.registration_emission;
      this.cpf = gr.cpf;
    }
  },
  data(){
    return {
      registration_number: '',
      emitter: '',
      registration_emission: '',
      cpf: '',
    }
  },
  filters: {
    cleanCPF: function(cpf){
      this.cpf.replace('.', '').replace('-', '');
    }
  }
}
</script>

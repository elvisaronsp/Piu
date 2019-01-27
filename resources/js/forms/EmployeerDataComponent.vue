<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4">Dados do funcionário</h1>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="sus_card">Cartão do SUS</label>
        <input class="form-control" type="text" v-model="sus_card" name="sus_card" required>
      </div>
      <div class="form-group col-md-6">
        <label for="allergic">Alergia</label>
        <input class="form-control" type="text" v-model="allergic" name="allergic">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="breed">Cor</label>
        <select class="form-control" v-model="breed" name="breed" required>
          <option value="">Selecione a sua cor</option>
          <option value="Branco">Branco</option>
          <option value="Pardo">Pardo</option>
          <option value="Negro">Negro</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <select-ajax-component url="/api/responsability/get" name="responsability_id" placeholder="Selecione o cargo" label="Cargo"></select-ajax-component>
      </div>
      <div class="form-group col-md-6">
        <label for="formation">Formação</label>
        <input class="form-control" type="text" name="formation" v-model="formation" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="specialization">Especialização</label>
        <input class="form-control" type="text" name="specialization" v-model="specialization">
      </div>
      <div class="form-group col-md-6">
        <label for="contract">Contrato</label>
        <input class="form-control" type="text" name="contract" v-model="contract" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="statutory">Estatutário</label>
        <input class="form-control" type="text" name="statutory" v-model="statutory">
      </div>
      <div class="form-group col-md-6">
        <label for="workload">Carga horária</label>
        <input class="form-control" type="number" name="workload" v-model="workload">
      </div>
    </div>
  </div>
</template>

<script>
import SelectAjaxComponent from './elements/SelectAjaxComponent';

export default {
  data(){
    return {
      sus_card: '',
      allergic: '',
      breed: '',
      formation: '',
      specialization: '',
      contract: '',
      statutory: '',
      workload: ''
    }
  },
  components: {
    SelectAjaxComponent
  }
}
</script>

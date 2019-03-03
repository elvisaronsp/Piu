<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4">Dados do funcionário</h1>
        <input type="hidden" name="employeer_id" v-model="em.id">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-12">
        <label for="name">Nome completo</label>
        <input class="form-control" type="text" name="name" v-model="em.name" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="sus_card">Cartão do SUS</label>
        <input class="form-control" type="text" v-model="em.sus_card" name="sus_card" required>
      </div>
      <div class="form-group col-md-6">
        <label for="allergic">Alergia</label>
        <input class="form-control" type="text" v-model="em.allergic" name="allergic">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="breed">Cor</label>
        <select class="form-control" v-model="em.breed" name="breed" required>
          <option value="">Selecione a sua cor</option>
          <option value="Branco">Branco</option>
          <option value="Pardo">Pardo</option>
          <option value="Negro">Negro</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <!--<select-ajax-component :url="this.$routes.responsability.index" name="responsability_id" placeholder="Selecione o cargo" label="Cargo"></select-ajax-component>-->
        <label>Cargo</label>
        <select class="form-control" name="role" placeholder="Selecione o cargo" v-model="em.role">
          <option value="">Selecione o cargo</option>
          <option v-for="r in roles" :value="r.name">{{ r.title }}</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="formation">Formação</label>
        <input class="form-control" type="text" name="formation" v-model="em.formation" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="specialization">Especialização</label>
        <input class="form-control" type="text" name="specialization" v-model="em.specialization">
      </div>
      <div class="form-group col-md-6">
        <label for="contract">Contrato</label>
        <input class="form-control" type="text" name="contract" v-model="em.contract" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="statutory">Estatutário</label>
        <input class="form-control" type="text" name="statutory" v-model="em.statutory">
      </div>
      <div class="form-group col-md-6">
        <label for="workload">Carga horária</label>
        <input class="form-control" type="number" name="workload" v-model="em.workload">
      </div>
    </div>
  </div>
</template>

<script>
import SelectAjaxComponent from './elements/SelectAjaxComponent';

export default {
  props: ['roles', 'employeer', 'role'],
  data(){
    return {
      em: {
        id: '',
        sus_card: '',
        allergic: '',
        breed: '',
        formation: '',
        specialization: '',
        contract: '',
        statutory: '',
        workload: '',
        role: ''
      },
    }
  },
  components: {
    SelectAjaxComponent
  },
  mounted(){
    if(this.employeer){
      this.em = this.employeer;
    }
    if(this.role){
      this.em.role = this.role;
    }
  }
}
</script>

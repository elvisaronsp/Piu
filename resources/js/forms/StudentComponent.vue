<template>
  <div>
    <div class="row">
      <div class="col-md-12 form-group">
        <label>Nome</label>
        <input
          class="form-control"
          type="text"
          name="name"
          v-model="name"
          placeholder="Nome do aluno"
          required
        >
        <input type="hidden" name="student_id" v-model="id">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
        <label>Sexo</label>
        <select class="form-control" name="genre" v-model="genre" required>
          <option value>Selecione o sexo do aluno</option>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
        </select>
      </div>
      <div class="col-md-6 form-group">
        <label>Data de nascimento</label>
        <input class="form-control" type="date" name="born_in" v-model="born_in" required>
      </div>
      <div class="col-md-6 form-group">
        <label>Deficiência</label>
        <input
          class="form-control"
          type="text"
          name="special"
          v-model="special"
          placeholder="Deixe em branco para alunos não deficientes"
        >
      </div>
      <div class="col-md-3 form-group form-check pt-4">
        <input
          type="checkbox"
          class="form-check-input"
          id="special_report"
          v-model="special_report"
        >
        <label class="form-check-label" for="special_report">Possui relatório?</label>
      </div>
      <div class="col-md-3 form-group form-check pt-4">
        <input
          type="checkbox"
          class="form-check-input"
          id="multi_activity"
          v-model="multi_activity"
        >
        <label
          class="form-check-label"
          for="multi_activity"
        >Atividade em sala com recurso multifuncional?</label>
      </div>
      <div class="col-md-12">
        <special-details v-if="multi_activity" :special-details="special_details"></special-details>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label>Bolsa família</label>
        <input
          class="form-control"
          type="text"
          name="bolsa_familia"
          v-model="bolsa_familia"
          placeholder="Número do cartão do bolsa família"
        >
      </div>
      <div class="col-md-6 form-group">
        <label>Cartão do SUS</label>
        <input
          class="form-control"
          type="text"
          name="sus"
          v-model="sus"
          placeholder="Informe o número do cartão do SUS"
          required
        >
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label>Telefone da Mãe</label>
        <the-mask class="form-control" :mask="['(##) ####-####', '(##) #####-####']" placeholder="Digite o número da mãe" v-model="mother_contact"/>
        <input type="hidden" name="mother_contact" :value="mother_contact">
      </div>
      <div class="col-md-6">
        <label>Telefone do Pai</label>
        <the-mask class="form-control" :mask="['(##) ####-####', '(##) #####-####']" placeholder="Digite o número do pai" v-model="father_contact"/>
        <input type="hidden" name="father_contact" :value="father_contact">
      </div>
    </div>
  </div>
</template>
<script>
import SpecialDetails from "./SpecialDetailsComponent";
export default {
  props: ["student"],
  components: {
    SpecialDetails
  },
  mounted() {
    let s = this.student;
    if (s) {
      this.id = s.id;
      this.name = s.name;
      this.genre = s.genre;
      this.born_in = s.born_in;
      this.special = s.special;
      this.multi_activity = s.multi_activity;
      this.special_report = s.special_report;
      this.father_contact = s.father_contact;
      this.mother_contact = s.mother_contact;
      this.sus = s.sus;
      this.bolsa_familia = s.bolsa_familia;
      this.loadSpecialDetails();
    }
  },
  methods: {
    loadSpecialDetails() {
      //TODO: Corrigir falha nesta requisição
      /*axios
        .get(this.$routes.special_details.index.replace(":id:", this.id))
        .then(response => {
          this.special_details = response.data;
        });*/
    }
  },
  data() {
    return {
      id: "",
      name: "",
      genre: "",
      born_in: "",
      special: "",
      special_report: "",
      multi_activity: "",
      father_contact: "",
      mother_contact: "",
      special_details: {
        activity: "",
        shift: "",
        observation: ""
      },
      sus: "",
      bolsa_familia: ""
    };
  }
};
</script>

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
      <div class="col-md-6 form-group form-check pt-4">
        <input type="checkbox" class="form-check-input" v-model="special_report">
        <label class="form-check-label">Possui relatório?</label>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["student"],
  mounted() {
    let s = this.student;
    if (s) {
      this.id = s.id;
      this.name = s.name;
      this.genre = s.genre;
      this.born_in = s.born_in;
      this.special = s.special;
      this.special_report = s.special_report;
    }
  },
  data() {
    return {
      id: "",
      name: "",
      genre: "",
      born_in: "",
      special: "",
      special_report: ""
    };
  }
};
</script>

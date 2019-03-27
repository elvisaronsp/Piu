<template>
  <div class="row">
    <div class="col-md-6 form-group">
      <label>Atividade em sala de recurso multifuncional</label>
      <input
        type="text"
        class="form-control"
        name="activity"
        placeholder="Digite a atividade que o aluno pratica"
      >
    </div>
    <div class="col-md-6 form-group">
      <label>Turno</label>
      <select class="form-control" v-model="shift">
        <option value="morning">Matutino</option>
        <option value="afternoon">Vespertino</option>
        <option value="nocturnal">Noturno</option>
      </select>
    </div>
    <div class="col-md-12">
      <label>Observações</label>
      <textarea
        class="form-control"
        cols="30"
        rows="8"
        v-model="observation"
        placeholder="Alguma observação adicional..."
      ></textarea>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      activity: "",
      shift: "",
      observation: ""
    };
  }
};
</script>


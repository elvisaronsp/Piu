<template>
    <div>
      <div class="row">
        <div class="form-group col-md-6">
          <label>Título da turma</label>
          <input class="form-control" v-model="title" type="text" name="title" placeholder="Ex.: 8º ano" required>
        </div>
        <div class="form-group col-md-6">
          <label>Turno</label>
          <select class="form-control" name="shift" required>
            <option value="">Selecione o turno</option>
            <option value="morning">Matutino</option>
            <option value="afternoon">Vespertino</option>
            <option value="nocturnal">Noturno</option>
          </select>
        </div>
      </div>
    </div>
</template>
<script>
export default {
  data(){
    return {
      title: ''
    };
  }
}
</script>

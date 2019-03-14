<template>
    <div>
      <div class="row">
        <div class="form-group col-md-6">
          <label>Título da turma</label>
          <input type="hidden" name="id" v-model="g.id">
          <input class="form-control" v-model="g.title" type="text" name="title" placeholder="Ex.: 8º ano" required>
        </div>
        <div class="form-group col-md-6">
          <label>Turno</label>
          <select class="form-control" name="shift" v-model="g.shift" required>
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
  props: ['group'],
  data(){
    return {
      g:{
        id: '',
        title: '',
        shift: ''
      }
    };
  },
  mounted() {
    if(this.group){
      this.g = this.group;
    }
  }
}
</script>

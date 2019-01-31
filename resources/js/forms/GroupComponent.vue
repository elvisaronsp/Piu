<template>
    <div>
      <div class="row">
        <div class="form-group col-md-8">
          <label>Título da turma</label>
          <input class="form-control" v-model="title" type="text" name="title" placeholder="Ex.: 8º ano">
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

<template>
  <div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Nome da matéria</label>
        <input class="form-control" type="text" v-model="title" name="title">
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

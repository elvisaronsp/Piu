<template>
  <div class="row">
    <div class="col-md-6">
      <label for="vocation_start">Início das férias</label>
      <input type="date" name="vocation_start" v-model="vocation_start">
    </div>
    <div class="col-md-6">
      <label for="vocation_end">Fim das férias</label>
      <input type="date" name="vocation_start" v-model="vocation_start">
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      vocation_start: '',
      vocation_end: ''
    }
  }
}
</script>

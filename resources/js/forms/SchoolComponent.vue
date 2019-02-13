<template>
  <div>
    <h3 class="display-4">Informações da instituição</h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Nome da instituição</label>
          <input class="form-control" type="text" name="name" v-model="name" value="" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="code">Código</label>
          <input class="form-control" type="text" name="code" value="" v-model="code" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="act_creation">Ato de criação</label>
          <input class="form-control" type="text" name="act_creation" value="" v-model="act_creation" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="act_creation_date">Data do ato de criação</label>
          <input class="form-control" type="date" name="act_creation_date" value="" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="direc_number">Direc. Número</label>
          <input class="form-control" type="text" name="direc_number" v-model="direc_number" value="" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="logo">Logotipo</label>
          <input class="form-control-file" type="file" name="logo" v-on:change="logo" value="" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="city_logo">Logotipo do município</label>
          <input class="form-control-file" type="file" name="logo_city" v-on:change="logo_city" value="" required>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data(){
        return {
          name: '',
          code: '',
          act_creation: '',
          act_creation_date: '',
          direc_number: '',
          logo: '',
          logo_city: ''
        }
      }
    }
</script>

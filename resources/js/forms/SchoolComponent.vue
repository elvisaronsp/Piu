<template>
  <div>
    <h3 class="display-4">Informações da instituição</h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Nome da instituição</label>
          <input class="form-control" type="text" name="name" v-model="name" placeholder="Digite o nome da instituição" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="code">Código</label>
          <input class="form-control" type="text" name="code" v-model="code" placeholder="Digite o código da instituição" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="act_creation">Ato de criação</label>
          <input class="form-control" type="text" name="act_creation"  v-model="act_creation" placeholder="Informe o ato de criação" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="act_creation_date">Data do ato de criação</label>
          <input class="form-control" type="date" name="act_creation_date" placeholder="Informe a data do ato de criação" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="direc_number">Direc. Número</label>
          <input class="form-control" type="text" name="direc_number" v-model="direc_number" placeholder="Informe o direc. número" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="logo">Logotipo</label>
          <input class="form-control-file" type="file" name="logo" v-on:change="logo" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="city_logo">Logotipo do município</label>
          <input class="form-control-file" type="file" name="city_logo" v-on:change="city_logo" required>
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
          city_logo: ''
        }
      }
    }
</script>

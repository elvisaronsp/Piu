<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <label>Nome</label>
        <input class="form-control" type="text" name="name" placeholder="Nome do aluno">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label>Sexo</label>
        <select class="form-control" name="genre">
          <option>Selecione o sexo do aluno</option>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Data de nascimento</label>
        <input class="form-control" type="date" name="birth_in">
      </div>
    </div>
    <address-component></address-component>
    <birth-component></birth-component>
  </div>
</template>

<script>

import AddressComponent from './AddressComponent';
import BirthComponent from './AddressComponent';

export default {
  components: {
    AddressComponent,
    BirthComponent
  }
}
</script>

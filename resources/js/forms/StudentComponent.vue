<template>
  <div>
    <div class="row">
      <div class="col-md-12 form-group ">
        <label>Nome</label>
        <input class="form-control" type="text" name="name" v-model="name" placeholder="Nome do aluno">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
        <label>Sexo</label>
        <select class="form-control" name="genre" v-model="genre">
          <option value="">Selecione o sexo do aluno</option>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
        </select>
      </div>
      <div class="col-md-6 form-group">
        <label>Data de nascimento</label>
        <input class="form-control" type="date" name="born_in" v-model="born_in">
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data(){
    return {
      name: '',
      genre: '',
      born_in: '',
    }
  }
}
</script>

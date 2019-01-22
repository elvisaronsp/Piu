<template>
    <div>
      <h2 class="display-4">Dados de acesso</h2>
      <hr>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="email" class="col-form-label text-md-right">E-mail</label>
          <input id="email" type="email" class="form-control" name="email" v-model="email" value="" placeholder="Digite o e-mail" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="password" class="col-form-label text-md-right">Senha</label>
          <input id="password" type="password" class="form-control" v-model="password" placeholder="Digite sua senha" name="password" required>
        </div>
        <div class="form-group col-md-6">
          <label for="password-confirm" class="col-form-label text-md-right">Confirmar senha</label>
          <input id="password-confirm" type="password" class="form-control" placeholder="Confirme a sua senha" v-model="password_confirmation" name="password_confirmation" required>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        data(){
          return {
            email: '',
            password: '',
            password_confirmation: '',
          }
        }
    }
</script>

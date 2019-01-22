<template>
  <form method="POST" action="/login"  v-on:submit="login()">
      <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

          <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email" value="" v-model="email" required autofocus>
          </div>
      </div>

      <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" v-model="password" required>
          </div>
      </div>
      <div class="form-group row mb-0">
          <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-primary">Entrar</button>
              <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>-->
          </div>
      </div>
    </form>
</template>

<script>
    export default {
        data() {
          return {
            email: '',
            password: '',
            result: ''
          }
        },
        methods: {
          
        }
    }
</script>

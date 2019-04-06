<template>
  <div>
    <h3 class="display-4">Endereço</h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <label for="street">Rua</label>
        <input class="form-control" type="text" name="street" v-model="street" value="" placeholder="Ex.: Alameda das rosas" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="codpostal">Código postal</label>
          <the-mask :mask="['#####-###']" class="form-control" type="text" name="cod_postal" v-model="cod_postal" placeholder="Digite o código postal" required />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="state">Estado</label>
          <select class="form-control" name="state" v-model="state" required>
            <option value="">Selecione o estado...</option>
            <option v-bind:value="state.value" v-for="state in states">{{ state.text }}</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="city">Cidade</label>
          <input class="form-control" type="text" name="city" v-model="city" value="" placeholder="Informe a cidade" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="neighborhood">Bairro</label>
          <input class="form-control" type="text" name="neighborhood" v-model="neighborhood" value="" placeholder="Digite o bairro" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="number">Número</label>
          <input class="form-control" type="text" name="number" v-model="number" value="" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="complement">Complemento</label>
          <input class="form-control" type="text" name="complement" v-model="complement" value="">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        props: ['address'],
        mounted() {
          let address = this.address;
          if(address){
            this.street = address.street;
            this.city = address.city;
            this.cod_postal = address.cod_postal;
            this.state = address.state;
            this.neighborhood = address.neighborhood;
            this.number = address.number;
            this.complement = address.complement;
          }
        },
        data(){
          return {
              street: '',
              city: '',
              cod_postal: '',
              state: '',
              neighborhood: '',
              number: '',
              complement: '',
          }
        }
    }
</script>

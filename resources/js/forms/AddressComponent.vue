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
          <input class="form-control" type="text" name="cod_postal" value="" v-model="codpostal" placeholder="Digite o código postal" required>
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
        mounted() {

        },

        data(){
          return {
              street: '',
              city: '',
              codpostal: '',
              state: '',
              neighborhood: '',
              number: '',
              state: '',
              complement: '',
              states: [
                { value: "AC", text: "Acre" },
                { value: "AL", text: "Alagoas" },
                { value: "AP", text: "Amapá" },
                { value: "AM", text: "Amazonas" },
                { value: "BA", text: "Bahia" },
                { value: "CE", text: "Ceará" },
                { value: "DF", text: "Distrito Federal" },
                { value: "ES", text: "Espírito Santo" },
                { value: "GO", text: "Goiás" },
                { value: "MA", text: "Maranhão" },
                { value: "MT", text: "Mato Grosso" },
                { value: "MS", text: "Mato Grosso do Sul" },
                { value: "MG", text: "Minas Gerais" },
                { value: "PA", text: "Pará" },
                { value: "PB", text: "Paraíba" },
                { value: "PR", text: "Paraná" },
                { value: "PE", text: "Pernambuco" },
                { value: "PI", text: "Piauí" },
                { value: "RJ", text: "Rio de Janeiro" },
                { value: "RN", text: "Rio Grande do Norte" },
                { value: "RS", text: "Rio Grande do Sul" },
                { value: "RO", text: "Rondônia" },
                { value: "RR", text: "Roraima" },
                { value: "SC", text: "Santa Catarina" },
                { value: "SP", text: "São Paulo" },
                { value: "SE", text: "Sergipe" },
                { value: "TO", text: "Tocantins" }
              ],
          }
        }
    }
</script>

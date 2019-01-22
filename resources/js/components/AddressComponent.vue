<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <label for="street">Rua</label>
        <input type="text" name="street" v-model="street" value="" placeholder="Ex.: Alameda das rosas" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="codpostal">Código postal</label>
          <input type="text" name="cod_postal" value="" v-model="codpostal" placeholder="Digite o código postal" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="state">Estado</label>
          <select class="form-control" name="state" v-model="state" required>
            <option value="">Selecione o estado</option>
            <option v-bind:value="state.key" v-for="state in states">{{ state.value }}</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="city">Cidade</label>
          <input type="text" name="city" v-model="city" value="" placeholder="Informe a cidade" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="neighborhood">Bairro</label>
          <input type="text" name="neighborhood" v-model="neighborhood" value="" placeholder="Digite o bairro" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="number">Número</label>
          <input type="text" name="number" v-model="number" value="" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="complement">Complemento</label>
          <input type="text" name="complement" v-model="complement" value="">
        </div>
      </div>
    </div>

  </div>
</template>

<script>
    export default class {
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
                        { 'AC': 'Acre' },
                        { 'AL': 'Alagoas' },
                        { 'AP': 'Amapá' },
                        { 'AM': 'Amazonas' },
                        { 'BA': 'Bahia' },
                        { 'CE': 'Ceará' },
                        { 'DF': 'Distrito Federal' },
                        { 'ES': 'Espírito Santo' },
                        { 'GO': 'Goías' },
                        { 'MA': 'Maranhão' },
                        { 'MT': 'Mato Grosso' },
                        { 'MS': 'Mato Grosso do Sul' },
                        { 'MG': 'Minas Gerais' },
                        { 'PA': 'Pará' },
                        { 'PB': 'Paraíba' },
                        { 'PR': 'Paraná' },
                        { 'PE': 'Pernambuco' },
                        { 'PI': 'Piauí' },
                        { 'RJ': 'Rio de Janeiro' },
                        { 'RN': 'Rio Grande do Norte' },
                        { 'RS': 'Rio Grande do Sul' },
                        { 'RO': 'Rondônia' },
                        { 'RR': 'Roraíma' },
                        { 'SC': 'Santa Catarina' },
                        { 'SP': 'São Paulo' },
                        { 'SE': 'Sergipe' },
                        { 'TO': 'Tocantins' },
                      ],
          }
        }
    }
</script>

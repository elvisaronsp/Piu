<template>
  <div class="row">
    <div class="col-md-6">
      <div v-if="Object.keys(errors).length" class="alert alert-danger" role="alert">
        <ul>
          <li v-for="error in errors">
            {{ error[0] | translate }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import ptBR from '../lang/ptBR.js'
export default {
    props: ['errors'],
}
</script>

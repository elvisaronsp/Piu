<template>
  <div>
    <div class="col-md-3 no-print">
      <button class="btn btn-warning" type="button" @click="print">
        <feather type="printer"></feather>
      </button>
    </div>
    <div class="card">
      <div class="card-body">
        <student-ata-header-component :group="group"></student-ata-header-component>
        <student-ata-body-component :group="group"></student-ata-body-component>
      </div>
    </div>
  </div>
</template>
<script>
  import Feather from 'vue-feather';
  import StudentAtaHeaderComponent from './StudentAtaHeaderComponent';
  export default {
    props: ['group'],
    components: {
      StudentAtaHeaderComponent, Feather
    }
  }
</script>

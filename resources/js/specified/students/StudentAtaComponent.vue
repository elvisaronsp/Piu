<template>
  <div class="card">
    <div class="card-body">
      <student-ata-header-component :group="group"></student-ata-header-component>
      <student-ata-body-component :group="group"></student-ata-body-component>
    </div>
  </div>
</template>
<script>
  import StudentAtaHeaderComponent from './StudentAtaHeaderComponent';
  export default {
    props: ['group'],
    components: {
      StudentAtaHeaderComponent
    }
  }
</script>

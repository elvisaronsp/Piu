<template>
  <div class="card">
    <div class="card-body">
      <student-ata-header :group="group"></student-ata-header>
    </div>
  </div>
</template>
<script>
  import StudentAtaHeader from './StudentAtaHeader';
  export default {
    props: ['group'],
    components: {
      StudentAtaHeader
    }
  }
</script>

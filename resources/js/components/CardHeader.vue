<template>
  <div class="card mb-3 p-3">
    <div class="row no-gutters">
      <div class="col-md-3 align-self-center text-center">
        <feather :type="icon" size="2.5rem"></feather>
      </div>
      <div class="col-md-9">
        <div class="card-body">
          <h5 class="card-title">{{ title }}</h5>
          <p class="card-text"><small class="text-muted">{{ subtitle }}</small></p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['title', 'subtitle', 'icon']
  }
</script>

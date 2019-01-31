<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-12 card">
        <div class="card-body">
          <button class="btn btn-primary" type="submit">{{ buttonLabel }}</button>
        </div>
      </div>
    </div>

  </div>
</template>
<script>
export default {
  props: ['buttonLabel']
}
</script>

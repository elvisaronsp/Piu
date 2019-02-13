<template>
  <div class="row">
    <div class="col-md-2">
      <img :src="logo" width="200" alt="school logo">
    </div>
    <div class="col-md-8">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2>{{ group.school.name }}</h2>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <img :src="city_logo" width="200" alt="city logo">
    </div>
  </div>
</template>
<script>
  export default {
    props: ['group'],
    computed: {
      city_logo: function(){
        return  this.$routes.images.show.replace(':fileName:', this.group.school.city_logo);
      },
      logo: function(){
        return  this.$routes.images.show.replace(':fileName:', this.group.school.logo);
      }
    }
  }
</script>

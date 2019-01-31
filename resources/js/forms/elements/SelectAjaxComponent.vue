<template>
  <div>
    <label>{{ label }}</label>
    <select class="form-control" :name="name" required>
      <option value="">{{ placeholder }}</option>
      <option :value="option.id" v-for="option in options"> {{ option.title }} </option>
    </select>
  </div>
</template>

<script>
export default {
  props: ['name', 'url', 'label', 'placeholder'],
  data(){
    return {
      options: []
    }
  },
  watch: {
    options: function(newValue){
      console.log(newValue);
    }
  },
  mounted() {
    axios.get(this.url)
         .then(response => (this.options = response.data))
         .catch(error => console.log(error));
  }
}
</script>

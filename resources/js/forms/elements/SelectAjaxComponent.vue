<template>
  <div>
    <select class="form-control" :name="name">
      <option :value="option.id" v-for="option in options"> {{ option.name }} </option>
    </select>
  </div>
</template>

<script>
export default {
  props: ['name', 'url'],
  data(){
    return {
      options: []
    }
  },

  mounted() {
    axios.get(this.url)
         .then(response => (this.options = response))
         .catch(error => console.log(error));
  }
}
</script>

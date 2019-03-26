<template>
  <div class="mb-3">
    <v-select
      v-model="selected"
      :on-search="search"
      placeholder="Digite o que está procurando..."
      :options="toVSelectData($store.state[entity].data)"
    ></v-select>
  </div>
</template>
<script>
import vSelect from "vue-select";
export default {
  props: ["entity"],
  components: {
    vSelect
  },
  data(){
    return {
      selected: null
    }
  },
  methods: {
    search(name, loading) {
      this.$store.commit("search", {
        entity: this.entity,
        search: name,
        loading: loading
      });
    }
  }
};
</script>

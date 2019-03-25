<template>
  <div class="mb-3">
    <v-select
      :on-search="search"
      placeholder="Digite o que está procurando..."
      :options="$store.state[entity]"
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


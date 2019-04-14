<template>
  <div>
    <h2>Matricular aluno</h2>
    <hr>
    <div class="form-group">
      <label>Selecione a turma</label>
      <v-select
        v-model="group"
        maxHeight="80px"
        placeholder="Selecione a turma"
        :options="toVSelectData(fetched_groups)"
      ></v-select>
    </div>
    <div class="form-group">
      <button class="btn btn-primary" v-on:click="matricular" :disabled="disabled">
        <span
          v-show="loading"
          class="spinner-border spinner-border-sm"
          role="status"
          aria-hidden="true"
        ></span>
        {{ text }}
      </button>
    </div>
  </div>
</template>

<script>
import vSelect from "vue-select";
export default {
  components: {
    vSelect
  },
  data() {
    return {
      fetched_groups: [],
      group: "",
      loading: false,
      text: "Matricular aluno",
      disabled: false
    };
  },
  watch: {
    loading: function(newValue) {
      if (newValue) {
        this.text = "Matriculando aluno";
        this.disabled = true;
      }
    }
  },
  mounted() {
    this.loadGroups();
  },
  methods: {
    loadGroups: function() {
      axios
        .get(this.$routes.groups.index)
        .then(response => (this.fetched_groups = response.data.data));
    },
    matricular: function() {
      this.loading = true;
      axios
        .post("/student-groups/store", {
          _token: this.$csrf,
          group_id: this.group.value,
          student_id: this.entityId
        })
        .then(response => {
          this.text = "Matricular aluno";
          this.disabled = false;
          this.loading = false;
          this.showMessage("Parabéns!", "Aluno matriculado com sucesso!");
        })
        .catch(err => {
          this.disabled = false;
          this.loading = false;
          this.showMessage("Ops! Há um problema aqui", err.response.data);
        });
    }
  },
  props: ["entityId"]
};
</script>

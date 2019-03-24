<template>
  <li class="nav-item dropdown">
    <a
      href="#"
      class="nav-link remove-arrow"
      id="navbarDropdown"
      role="button"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
      title="Pedidos de confirmação de transferências de alunos"
    >
      <feather type="user" size="18" class="align-middle"></feather>
      <span
        v-if="notifications.length > 0"
        class="badge badge-pill badge-primary"
      >{{ notifications.length }}</span>
    </a>
    <div
      class="dropdown-menu dropdown-menu-right notifications-box justify-content-center"
      aria-labelledby="navbarDropdown"
    >
      <moon-loader v-if="loading" :loading="loading" color="blue" size="24px"></moon-loader>
      <div v-else>
        <div v-if="notifications.length > 0">
          <a
            :href="$routes.student_transfer.view.replace(':id:', n.id)"
            class="dropdown-item w-100"
            v-for="n in notifications"
            :key="n.id"
          >
            A instituição de ensino {{ n.old_school_name }}
            <br>solicitou uma confirmação de transferência
            <br>
            do aluno {{ n.student_name }}
          </a>
        </div>
        <div v-else>
          <a class="dropdown-item" href="#">Nenhuma confirmação de transferência.</a>
        </div>
      </div>
    </div>
  </li>
</template>
<script>
import MoonLoader from "vue-spinner/src/MoonLoader.vue";
export default {
  components: {
    MoonLoader
  },
  data() {
    return {
      loading: true,
      notifications: []
    };
  },
  mounted() {
    axios
      .get(this.$routes.student_transfer.pending)
      .then(response => {
        this.notifications = response.data.data;
        this.loading = false;
      })
      .catch(err =>
        showMessage(
          "Ops!",
          "Ocorreu um erro ao carregar os pedidos de transferência"
        )
      );
  }
};
</script>


<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-end">
          <div class="col-md-6">
            <h3>{{ title }}</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="btn-group" role="group" aria-label="Opções">
              <a v-for="button in buttons" class="btn btn-primary btn-small w-100" :key="button.id" :href="button.url">
                <feather :type="button.feather_icon"></feather> {{ button.name }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Feather from 'vue-feather';
export default {
  props: ['buttons', 'title'],
  components: {
    Feather
  }
}
</script>

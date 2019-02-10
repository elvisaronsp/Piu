<template>
  <div>
    <div v-if="entityId !== 0" class="text-right mb-3">          
        <button class="btn btn-primary" v-for="b in $entities[entity]" :key="b.id" @click="b.click(entityId)">
            {{ b.label }}
        </button>
    </div>
  </div>
</template>
<script>
export default {
  props: ['entityId', 'entity'],
}
</script>

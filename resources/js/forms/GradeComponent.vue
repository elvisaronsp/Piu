<template>
  <div>
    <h1>Lançamento de notas</h1>
    <hr>
    <div class="form-group">
      <label><b>Matéria</b></label>
      <v-select v-model="stuff" :options="stuffs"></v-select>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label><b>Nota</b></label>
          <the-mask :mask="['#.##', '##.##']" v-model="" class="form-control" placeholder="0.00"/>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import vSelect from 'vue-select';
  export default {
    props: ['studentId'],
    data: function(){
      return {
        stuffs: [],
        stuff: '',
        nota: ''
      }
    },
    mounted(){
      axios.get('/stuffs')
           .then(response => ( this.stuffs = this.toVSelectData(response.data.data) ) );
    },
    components: {
      vSelect
    },
    methods:{
      submit: function(){
        
      }
    }
  }
</script>

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
          <the-mask :mask="['#.##', '##.##']" v-model="grade" class="form-control" placeholder="0.00"/>
        </div>
      </div>
    </div>
    <button :class="'btn btn-'+style" v-on:click="submit" :disabled="disabled">
      Aplicar nota
    </button>
  </div>
</template>
<script>
  import vSelect from 'vue-select';
  export default {
    props: ['studentId', 'groupId'],
    data: function(){
      return {
        stuffs: [],
        stuff: '',
        grade: '',
        style: 'primary',
        text: 'Aplicar nota',
        disabled: false
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
        if(numeral(this.grade).value() <= 10){
          axios.post('/grades/store', {
            _token: this.$csrf,
            stuff_id: this.stuff,
            group_id: this.groupId,
            student_id: this.studentId,
            value: grade 
          }).then(response => {
            this.disabled = true;
            this.text = 'Nota aplicada com sucesso!';
          });
        }else{
          this.style = 'danger';
          this.text = 'Você não pode dar uma nota maior que 10! (Corrija e tente novamente)';
        }
      }
    }
  }
</script>

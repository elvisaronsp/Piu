<template>
  <div>
    <div v-if="!oldGrade">
      <h1>Lançamento de notas</h1>
      <hr>
    </div>
    <div class="form-group">
      <label><b>Matéria</b></label>
      <v-select v-model="stuff" maxHeight="150px" placeholder="Selecione a matéria" :options="stuffs"></v-select>
    </div>
    <div class="form-group">
      <label><b>Unidade</b></label>
      <v-select v-model="unit" maxHeight="150px" placeholder="Selecione a unidade" :options="units"></v-select>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label><b>Nota</b></label>
          <the-mask :mask="['#.##', '##.##']" v-model="grade" :masked="true" class="form-control" placeholder="0.00"/>
        </div>
      </div>
    </div>
    <button :class="'btn btn-'+style" v-on:click="submit" :disabled="disabled || notFilled">
      <moon-loader :loading="loading" color="white" size="35"></moon-loader>
      {{ text }}
    </button>
  </div>
</template>
<script>
  import vSelect from 'vue-select';
  import MoonLoader from 'vue-spinner/src/MoonLoader.vue'

  export default {
    props: ['studentGroupId', 'groupId', 'oldGrade'],
    data: function(){
      return {
        stuffs: [],
        units: [],
        stuff: '',
        grade: '',
        unit: '',
        style: 'primary',
        text: 'Realizar lançamento',
        disabled: false,
        loading: false,
        unitsLoaded: false,
        stuffsLoaded: false,
      }
    },
    watch:{
      unitsLoaded: function(enabled){
        if(enabled && this.stuffsLoaded){
          this.loadOldGrade();
        }
      },
      stuffsLoaded: function(enabled){
        if(enabled && this.unitsLoaded){
          this.loadOldGrade();
        }
      }
    },
    mounted(){
      axios.get(this.$routes.stuffs.index+'?group_id='+this.groupId)
           .then(response =>  {
              this.stuffs = this.toVSelectData(response.data.data);
              this.stuffsLoaded = true;
            });
      axios.get(this.$routes.units.index)
           .then(response => {
             this.units = this.toVSelectData(response.data.data);
             this.unitsLoaded = true;
           });
    },
    components: {
      vSelect, MoonLoader
    },
    computed: {
      notFilled: function(){
        return this.grade == '' || this.stuff == '' || this.unit == '';
      }
    },
    methods:{
      loadOldGrade: function(){
        if(this.oldGrade){
          this.unit = { label: this.oldGrade.unit.title, value: this.oldGrade.unit.id };
          this.stuff = { label: this.oldGrade.stuff.title, value: this.oldGrade.stuff.id };
          this.grade = this.oldGrade.value;
        }
      },
      submit: function(){
        if(parseFloat(this.grade) <= 10){
          this.loading = true;
          this.text = '';
          this.disabled = true;
          let url = '';
          let data = {
            _token: this.$csrf,
            stuff_id: this.stuff.value,
            student_group_id: this.studentGroupId,
            unit_id: this.unit.value,
            value: this.grade
          };
          if(this.oldGrade){
            url = this.$routes.grades.update;
            data['id'] = this.oldGrade.id;
          }else{
            url = this.$routes.grades.store;
          }
          axios.post(url, data).then(response => {
            this.showMessage('Concluído', 'Nota lançada com sucesso!');
            if(!this.oldGrade){
              this.clearForm();
            }else{
              this.disabled = false;
              this.loading = false;
              this.text = 'Realizar lançamento';
            }
          }).catch(err => {
            this.disabled = false;
            this.loading = false;
            this.text = 'Realizar lançamento';
            this.showMessage('Ops! Algo de errado aconteceu', 'Contate o administrador e informe o problema.');
          });
        }else{
          this.style = 'danger';
          this.text = 'Você não pode dar uma nota maior que 10! (Corrija e tente novamente)';
        }
      },
      clearForm(){
        this.disabled = false;
        this.loading = false;
        this.stuff = '';
        this.unit = '';
        this.grade = '';
        this.text = 'Realizar lançamento';
      }
    }
  }
</script>

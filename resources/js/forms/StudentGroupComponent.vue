<template>
  <div>
  	<h2>Matricular aluno</h2>
  	<hr>
  	<div class="form-group">
  		<label>Selecione a turma</label>
  		<v-select v-model="group" :options="toVSelectData(groups)"></v-select>
  	</div>
  	<div class="form-group">
  		<button :class="'btn btn-'+buttonStatus" v-on:click="matricular" :disabled="disabled">
        <span v-show="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        {{ text }}
      </button>
  	</div>
  </div>
</template>

<script>
import vSelect from 'vue-select';
export default {
	components: {
		vSelect
	},
	data(){
		return {
			fetched_groups: [],
			group: '',
      loading: false,
      text: 'Matricular aluno',
      buttonStatus: 'primary',
      disabled: false
		};
	},
  watch: {
    loading: function(newValue){
      if(newValue){
        this.text = 'Matriculando aluno';
        this.disabled = true;
      }
    }
  },
	mounted(){
		this.loadGroups();
		console.log(this.entityId);
	},
	methods: {
		loadGroups: function(){
			axios.get('/groups')
				 .then(response => (this.fetched_groups = response.data.data));
		},
		matricular: function(){
      this.loading = true;
			axios.post('/student-groups/store', {
				_token: this.$csrf,
				group_id: this.group.value,
        student_id: this.entityId
			}).then(response => {
          this.buttonStatus = 'success';
          this.text = 'Aluno cadastrado com sucesso!';
          this.disabled = true;
          this.loading = false;
      });
		}
	},
  props: ['entityId']
}
</script>

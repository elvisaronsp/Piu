<template>
  <div>
  	<h2>Selecione a turma</h2>
  	<hr>
  	<div class="form-group">
  		<label>Selecione a turma</label>
  		<v-select v-model="group" :options="groups"></v-select>
  	</div>
  	<div class="form-group">
  		<button class="btn btn-primary" v-on:click="matricular"></button>
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
			group: ''
		};
	},
	computed: {
		groups: function(){
			let groups = [];
			if(this.fetched_groups !== undefined){
				this.fetched_groups.forEach((item, key) => groups.push({label: item["título"], value: item.id}));
			}
			return groups;
		}
	},
	mounted(){
		this.loadGroups();
		console.log(this.$parent);
	},
	methods: {
		loadGroups: function(){
			axios.get('/groups')
				 .then(response => (this.fetched_groups = response.data.data));
		},
		matricular: function(){
			axios.post('/student-groups/store', {
				_token: this.$csrf,
				student_group_id: this.group

			});
		}
	}
}
</script>

<template>
    <div>
        <h3>Transferir aluno para outra instituição</h3>
        <hr>
        <div class="row">
            <div class="col-md-12 form-group">
                <label>Instituição:</label>
                <v-select v-model="toSchool" maxHeight="150px" placeholder="Para onde o aluno será transferido?" :options="units"></v-select>
            </div>
        </div>
    </div>
</template>
<script>
import vSelect from 'vue-select';
export default {
    components: {
        vSelect
    },
    props: ['studentId'],
    data(){
        return {
            toSchool: ''
        }
    },
    methods: {
        loadSchools(name){
            return [
                {
                    label: 'Escola teste',
                    value: 'teste'
                }
            ];
        }
    }
}
</script>


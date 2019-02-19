<template>
  <div class="row">
    <div class="col-md-2">
      <img :src="logo" height="130" alt="school logo">
    </div>
    <div class="col-md-8">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <h2>
            <input type="text" placeholder="Título" class="live-edit" v-model="title">
          </h2>
          <h3>
            <input type="text" placeholder="Subtítulo" class="live-edit" v-model="subtitle">
          </h3>
          <h3> {{ group.school.name }} </h3>
          <p class="text-muted">Turma: {{ group.title }}</p>
          <div class="row">
            <div class="col-md-4">
              ATA DE RESULTADOS FINAIS
              <p>{{ new Date() | moment('YYYY') }}</p>
            </div>
            <div class="col-md-3">
              ATO DE CRIAÇÃO
              <p>{{ group.school.act_creation }}</p>
            </div>
            <div class="col-md-3">
              CÓDIGO
              <p>{{ group.school.code }}</p>
            </div>
            <div class="col-md-2">
              D.O.
              <p>{{ group.school.direc_number }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <textarea type="text" placeholder="Observações" class="live-edit" v-model="observations" rows="3">
                {{ observations }}
              </textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <img :src="city_logo" height="130" alt="city logo">
    </div>
  </div>
</template>
<script>
  export default {
    props: ['group'],
    data: function(){
      return {
        title: '',
        subtitle: '',
        observations: ''
      }
    },
    computed: {
      city_logo: function(){
        return  this.$routes.images.show.replace(':fileName:', this.group.school.city_logo);
      },
      logo: function(){
        return  this.$routes.images.show.replace(':fileName:', this.group.school.logo);
      }
    },
    watch: {
      title: function(newValue){
        this.saveOption('ata_header_title', newValue);
      },
      subtitle: function(newValue){
        this.saveOption('ata_header_subtitle', newValue);
      },
      observations: function(newValue){
        this.saveOption('ata_header_observations', newValue);
      }
    },
    mounted(){
      this.loadOption('ata_header_title').then(response =>{
         if(response.data.data.length == 1){
           this.title = response.data.data[0].valor
         }
      });
      this.loadOption('ata_header_subtitle').then(response =>{
         if(response.data.data.length == 1){
           this.subtitle = response.data.data[0].valor
         }
      });
      this.loadOption('ata_header_observations').then(response =>{
         if(response.data.data.length == 1){
           this.observations = response.data.data[0].valor
         }
      });
    }
  }
</script>

<template>
  <div class="row">
    <div class="col-md-2">
      <img :src="logo" width="200" alt="school logo">
    </div>
    <div class="col-md-8">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <h2>
            <live-edit :v-model="title" :editable="true" placeholder="Título" value=""></live-edit>
          </h2>
          <h3>
            <live-edit :v-model="subtitle" :editable="true" placeholder="Subtítulo" value=""></live-edit>
          </h3>
          <h3> {{ group.school.name }} </h3>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <img :src="city_logo" width="200" alt="city logo">
    </div>
  </div>
</template>
<script>
  import LiveEdit from '../../components/LiveEdit'
  export default {
    props: ['group'],
    components: {
      LiveEdit
    },
    data: function(){
      return {
        title: '',
        subtitle: ''
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
      }
    },
    methods: {
      loadOption(n) {
          return axios.get(this.$routes.options.index, {name: n});
      },
      saveOption(n, v) {
          return axios.post('/options/store',
          {
              _token: this.$csrf,
              name: n,
              value: v
          });
      }
    },
    mounted(){
      this.loadOption('ata_header_title').then(response =>{
         if(response.data.data.length == 1){
           this.title = response.data.data[0].valor
         }
      });
      this.loadOption('ata_header_subtitle').then(response =>{
         if(response.data.data.length > 0){
           this.subtitle = response.data.data[0].valor
         }
      });
    }
  }
</script>

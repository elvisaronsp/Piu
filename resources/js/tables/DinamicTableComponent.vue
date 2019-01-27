<template>
  <div>
    <table class="table table-responsive">
      <thead>
        <tr>
          <th scope="col" v-for="attribute in attributes">{{ attribute }}</th>
        </tr>
      </thead>
          <tbody>
            <tr v-for="(value, key, index) in Object.values(data)[1]">
              <td v-for="v in value">{{ v }}</td>
            </tr>
          </tbody>
    </table>
  </div>
</template>

<script>
    export default {
      props: ['data', 'refines'],
      data(){
          return  {
              attributes: {}
          };
      },
      filters: {
        refine: function(value){
          
        }
      },
      watch: {
        data: function(newValue){
          for(var i = 0; i < newValue.data.length; i++){
              this.attributes= Object.keys(newValue.data[i]);
              break;
          }
          return Object.values(newValue)[1];
        }
      }

    }
</script>

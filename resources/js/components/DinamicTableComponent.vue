<template>
  <table class="table">
    <thead>
      <tr>
        <th scope="col" v-for="attribute in headers">{{ attribute }}</th>
      </tr>
    </thead>
    <tbody>
      <!--
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
      -->
    </tbody>
  </table>
</template>

<script>
    export default {
      props: ['headers', ''],
    }
</script>

@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-3 text-center p-4">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Principal</a>
      <a class="nav-link" id="v-pills-employeers-tab" data-toggle="pill" href="#v-pills-employeers" role="tab" aria-controls="v-pills-employeers" aria-selected="false">Funcionários</a>
      <a class="nav-link" id="v-pills-stuffs-tab" data-toggle="pill" href="#v-pills-stuffs" role="tab" aria-controls="v-pills-stuffs" aria-selected="false">Matérias</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Turmas</a>
    </div>
  </div>
  <div class="col-9">
    <!-- Aqui ficará a lógica de exibição de páginas de acordo com o tipo de usuário. As páginas serão componentes Vuejs-->
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

      </div>
      <div class="tab-pane fade" id="v-pills-employeers" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          @include('employeer.index')
      </div>
      <div class="tab-pane fade" id="v-pills-stuffs" role="tabpanel" aria-labelledby="v-pills-stuffs-tab">
          @include('stuffs.index')
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
          @include('students.index')
      </div>
    </div>
  </div>
</div>
@endsection

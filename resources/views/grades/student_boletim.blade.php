@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Consultar notas</h1>
    <p class="lead">Você, estudante, pode realizar a consulta da sua nota através do seu CPF.</p>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <student-search-boletim-component></student-search-boletim-component>
    </div>
  </div>
</div>
@endsection

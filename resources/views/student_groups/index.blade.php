@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Gerenciamento de turmas</h1>
    <p class="lead">Busque por turmas e gerencie as notas dos seus alunos.</p>
  </div>
</div>
<div class="container">
  <div class="row">-
    <div class="col-md-4">
      <list-search-component entity="groups"></list-search-component>
    </div>
  </div>
</div>
@endsection

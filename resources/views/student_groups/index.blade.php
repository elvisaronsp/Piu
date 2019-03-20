@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Gerenciamento de turmas</h1>
    <p class="lead">Busque por turmas e gerencie as notas dos seus alunos.</p>
  </div>
</div>
<div class="container">
  <list-search-component entity="groups" url="groups?s="
   						 url-fetch-manual="/students/?group_id=:id:" list-entity="students">
  </list-search-component>
</div>
@endsection
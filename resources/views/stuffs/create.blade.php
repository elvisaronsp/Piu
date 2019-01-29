@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Adicionar matéria</h1>
    <p class="lead">Crie uma nova matéria</p>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <form class="col-md-8" action="{{ route('stuffs.create') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12 justify-content-center">
          @if(isset($errors))
            <error-component :errors="{{ $errors }}"></error-component>
          @endif
          <stuff-component></stuff-component>
          <button-bar-component button-label="Adicionar matéria"></button-bar-component>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

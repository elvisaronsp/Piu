@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Adicionar um novo funcionário</h1>
    <p class="lead">Crie professores, secretários e secretário de educação.</p>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <form class="col-md-8" action="{{ route('employeers.store') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12 justify-content-center">
          @if(isset($errors))
            <error-component :errors="{{ $errors }}"></error-component>
          @endif
          <address-component></address-component>
          <employeer-data-component></employeer-data-component>
          <birth-component></birth-component>
          <general-registration-component></general-registration-component>
          <user-component></user-component>
          <button-bar-component button-label="Registrar funcionário"></button-bar-component>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

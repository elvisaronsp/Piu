@extends('layouts.app')

@section('content')
<div class="container">
    <error-component :errors="{{ $errors }}"></error-component>
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row justify-content-center">
        <div class="col-md-8">
          <school-component></school-component>
        </div>
        <div class="col-md-8">
          <address-component></address-component>
        </div>
        <div class="col-md-8">
          <user-component></user-component>
        </div>
        <div class="col-md-8">
          <button-bar-component button-label="Registrar instituição"></button-bar-component>      
        </div>
      </div>
    </form>
</div>
@endsection

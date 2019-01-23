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
      </div>
      <div class="row justify-content-center">
      </div>
      <div class="row justify-content-center">
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 card">
          <div class="card-body">
            <button class="btn btn-primary" type="submit">Registrar instituição</button>
          </div>
        </div>
      </div>
    </form>
</div>
@endsection

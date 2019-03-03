@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">@yield('title')</h1>
    <p class="lead">@yield('description')</p>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <form class="col-md-8" action="@yield('route')" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12 justify-content-center">
          @if(isset($errors))
            <error-component :errors="{{ $errors }}"></error-component>
          @endif
          @yield('form_content')
        </div>
      </div>
    </form>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6">
      @yield('out_form')
    </div>
  </div>
</div>
@endsection

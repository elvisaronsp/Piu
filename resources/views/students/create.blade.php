@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <form class="col-md-8" action="{{ route('students.store') }}" method="post">
      @csrf
      <student-component></component>
    </form>
  </div>
</div>
@endsection

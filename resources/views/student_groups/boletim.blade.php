@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <student-boletim-component :student-group-id="{{ $student_group_id }}"></student-boletim-component>
    </div>
  </div>
</div>
@endsection

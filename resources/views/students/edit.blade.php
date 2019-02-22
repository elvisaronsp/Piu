@extends('base.create')
@section('title', 'Editar aluno')
@section('description', 'Faça alterações nos dados do aluno')
@section('route', route('students.update'))
@section('form_content')
<student-component :student="{{ $student }}"></student-component>
<birth-component :birth="{{ $student->birth_certificate }}"></birth-component>
<general-registration-component :general-registration="{{ $student->general_registration }}"></general-registration-component>
<address-component :address="{{ $student->address }}"></address-component>
<button-bar-component button-label="Registrar aluno"></button-bar-component>
@endsection

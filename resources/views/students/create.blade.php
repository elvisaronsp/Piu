@extends('base.create')
@section('title', 'Adicionar aluno')
@section('description', 'Crie alunos e para adicionar em turmas')
@section('route', route('students.store'))
@section('form_content')
<student-component></student-component>
<birth-component></birth-component>
<address-component></address-component>
<button-bar-component button-label="Registrar aluno"></button-bar-component>
@endsection

@extends('base.create')
@section('title', 'Adicionar uma turma')
@section('description', 'Crie turmas para alocar alunos')
@section('route', route('groups.store'))
@section('form_content')
<group-component></group-component>
<button-bar-component button-label="Registrar turma"></button-bar-component>
@endsection

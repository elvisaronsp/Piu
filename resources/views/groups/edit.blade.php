@extends('base.create')
@section('title', 'Editar uma turma')
@section('description', 'Edite as suas turmas')
@section('route', route('groups.update'))
@section('form_content')
<group-component :group="{{ $group }}"></group-component>
<button-bar-component button-label="Atualizar turma"></button-bar-component>
@endsection

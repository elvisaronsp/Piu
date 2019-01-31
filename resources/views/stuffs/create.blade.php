@extends('base.create')
@section('title', 'Adicionar matéria')
@section('description', 'Crie uma nova matéria')
@section('route', route('stuffs.store'))
@section('form_content')
<stuff-component></stuff-component>
<button-bar-component button-label="Registrar matéria"></button-bar-component>
@endsection

@extends('base.create')
@section('title', 'Editar matéria')
@section('description', 'Realize a edição de matérias criadas')
@section('route', route('stuffs.update'))
@section('form_content')
<stuff-component :stuff="{{ $stuff }}"></stuff-component>
<button-bar-component button-label="Registrar matéria"></button-bar-component>
@endsection

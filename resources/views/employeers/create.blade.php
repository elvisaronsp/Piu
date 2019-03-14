@extends('base.create')
@section('title', 'Adicionar um novo funcionário')
@section('description', 'Crie professores, secretários e secretário de educação.')
@section('route', route('employeers.store'))
@section('form_content')
<address-component></address-component>
<employeer-data-component :roles="{{ $roles }}"></employeer-data-component>
<birth-component></birth-component>
<general-registration-component></general-registration-component>
<user-component></user-component>
<button-bar-component button-label="Registrar funcionário"></button-bar-component>
@endsection

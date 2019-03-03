@extends('base.create')
@section('title', 'Editar funcionário')
@section('description', 'Edite professores, secretários e secretário de educação.')
@section('route', route('employeers.update'))
@section('form_content')
<address-component :address="{{ $employeer->address }}"></address-component>
<employeer-data-component :employeer="{{ $employeer->employeer_data }}" :roles="{{ $roles }}" role="{{ $employeer->role()->name }}"></employeer-data-component>
<birth-component :birth="{{ $employeer->birth_certificate }}"></birth-component>
<general-registration-component :general-registration="{{ $employeer->general_registration }}"></general-registration-component>
<button-bar-component button-label="Atualizar funcionário"></button-bar-component>
@endsection

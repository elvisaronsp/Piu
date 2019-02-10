@extends('base.create')
@section('title', 'Adicionar opção de configuração')
@section('description', 'Crie opções de configuração para serem utilizadas globalmente.')
@section('route', route('options.store'))
@section('form_content')
<option-component></option-component>
<button-bar-component button-label="Criar opção"></button-bar-component>
@endsection

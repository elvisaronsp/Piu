@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ $student->school->urlLogo() }}" width="100">
                    </div>
                    <div class="col-md-6 text-center"> <h2> Comprovante de matrícula </h2> </div>
                    <div class="col-md-3">
                        <img src="/images/{{ $student->school->city_logo }}" width="100">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>{{ $student->school->name }}</h5>
                        <p class="text-muted">{{ $student->school->address->build() }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Código: {{ $student->id }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>Nome do aluno: {{ $student->name }}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Data de nascimento: {{ Carbon\Carbon::parse($student->born_in)->format('d/m/Y') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Escolaridade: {{ count($student->student_group) > 0? $student->student_group[0]->group->title : 'Não matriculado'  }}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Turno: {{ count($student->student_group) > 0 ? __($student->student_group[0]->group->shift) : 'Não matriculado' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>CPF: {{ $student->general_registration->cpf }}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Bolsa Família: {{ $student->bolsa_familia }}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Cartão do SUS: {{ $student->sus }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
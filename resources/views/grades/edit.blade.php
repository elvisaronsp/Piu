@extends('base.create')
@section('title', 'Editar nota do aluno(a) '.$grade->student_group->student->name)
@section('description', 'As modificações realizadas aqui serão conhecidas pelo administrador.')
@section('route', route('stuffs.update'))
@section('out_form')
<grade-component :student-group-id="{{ $grade->student_group->id }}" group-id="{{ $grade->student_group->group_id }}"
                :old-grade="{{ $grade }}"></grade-component>
@endsection

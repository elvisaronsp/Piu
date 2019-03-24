@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Confirmação de transferência</h2>
        </div>
        <div class="col-md-12">
            <p>
                A instituição {{ $transfer->old_school->name }} está pedindo a confirmação da transferência 
                do aluno(a) {{ $transfer->student->name }} para a sua instituição.
            </p>
        </div>
        <div class="col-md-12">
            <form action="{{ route('student_transfer.update') }}" method="post">
                @csrf
                <input type="hidden" name="accepted" value="1">
                <button class="btn btn-success">Aceitar o aluno</button>
            </form>
            <form action="{{ route('student_transfer.update') }}" method="post">
                @csrf
                <input type="hidden" name="accepted" value="1">
                <button class="btn btn-danger">Recusar o aluno</button>
            </form>
        </div>
    </div>
</div>
@endsection
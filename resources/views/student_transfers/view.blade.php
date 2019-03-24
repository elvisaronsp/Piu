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
        @if($transfer->created_at == $transfer->update_at)
        <div class="col-md-2">
            <form action="{{ route('student_transfers.update', ['id' => $transfer->id]) }}" method="post">
                @csrf
                <input type="hidden" name="accepted" value="1">
                <button class="btn btn-success">
                    Aceitar o aluno
                </button>
            </form>
        </div>
        <div class="col-md-2">
            <form action="{{ route('student_transfers.update', ['id' => $transfer->id]) }}" method="post">
                @csrf
                <input type="hidden" name="accepted" value="0">
                <button class="btn btn-danger">
                    Recusar o aluno
                </button>
            </form>
        </div>
        @else
        <div class="col-md-6">
            @if($transfer->accepted)
                <div class="alert alert-success">
                    Esta transferência foi aceita com sucesso!
                </div>
            @else
                <div class="alert alert-danger">
                    Você recusou esta transferência
                </div>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection
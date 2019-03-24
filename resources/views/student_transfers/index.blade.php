@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1>Últimas transferências realizadas</h1>  
            <hr>      
        </div>
        <div class="col-md-8">
            <div class="list-group">
                @forelse($transfers as $t)
                    <a href="#" class="hvr-float list-group-item list-group-item-action text-center">
                        <div style="font-size: 16px;">
                            {{ $t->old_school->name }} 
                            <feather type="arrow-right" size="14px"></feather> 
                            {{ $t->student->name }}
                            <feather type="arrow-right" size="14px"></feather> 
                            {{ $t->new_school->name }}
                            <hr>
                        </div>
                        <p class="text-justify mt-2">
                            {{ $t->user->employeer? $t->user->employeer: 'a instituição de ensino' }} solicitou a transferência do aluno
                            <b>{{ $t->student->name }}</b> para a escola <b>{{ $t->new_school->name }}</b> na data 
                            <b>{{ $t->created_at->format('d/m/Y  H:m') }}</b>
                        </p>
                        <p class="text-muted text-left">{{ $t->accepted ? 'Transferência concluída ' : 'Aguardando aprovação da escola '. $t->new_school->name }}</p>
                    </a>
                @empty
                    Sem transferências
                @endforelse
            </div>
        </div>
        {{ $transfers->links() }}
    </div>    
</div>
@endsection
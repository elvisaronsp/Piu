@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <h1>Últimas transferências realizadas</h1>        
        </div>
        <div class="col-md-8">
            <ul class="list-group list-group-flush text-center border">
                @foreach($transfers as $t)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12">
                                <b class="badge badge-primary">{{ $t->student->name }}</b>
                            </div>
                            <div class="col-md-12">
                                <b class="mr-3 badge badge-danger">{{ $t->old_school->name }}</b> 
                                <feather type="arrow-right" size="14px"></feather>
                                <b class="ml-3 badge badge-success">{{ $t->new_school->name }}</b> 
                                <p class="text-justify mt-2">
                                    O aluno <b>{{ $t->student->name }}</b> foi transferido para <b>{{ $t->new_school->name }}</b> na data 
                                    <b>{{ $t->created_at->format('d/m/Y  H:m') }}</b> por 
                                    {{ $t->user->employeer? $t->user->employeer: 'a instituição de ensino' }}.
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        {{ $transfers->links() }}
    </div>
    
</div>

@endsection
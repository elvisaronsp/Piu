@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<p> Coming soon </p>
			{{ $student }}			
			{{ $student->address }}
			{{ $student->birth_certificate }}
			{{ $student->birth_certificate }}
		</div>
	</div>
</div>
@endsection
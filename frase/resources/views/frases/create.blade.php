@extends('layouts.app')
@section('content')


<div class="row">
	<div class="col-lg-12 margin-tb">
		<div>
			<h2>Criar nova frase</h2>
		</div>
	</div>
</div>


<form action="{{ route('frases.store') }}" method="POST">
	@csrf

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Title:</strong>
				<input type="text" name="title" class="form-control">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Body:</strong>
				<textarea class="form-control" name="body"> </textarea>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col text-center">
			<button type="submit" class="btn col btn-primary">CREATE</button>
		</div>
	</div>
</form>


@endsection 
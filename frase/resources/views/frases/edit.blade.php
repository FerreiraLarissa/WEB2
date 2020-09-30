@extends('layouts.app')
@section('content')


<div class="row">
	<div class="col">
		<div class="pull-left">
			<h2>Editar frase</h2>
		</div>
	</div>
</div>

<form  action="{{ route('frases.update',$frase->id) }}" method="POST">
	@csrf
	@method('PUT')

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Title:</strong>
				<input type="text" name="title" class="form-control" value= "{{ $frase->title }}">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Body:</strong>
				<textarea class="form-control" name="body" >{{ $frase->body }}</textarea>
			</div>
		</div>
	</div>

	<div class="col text-center">
		<button type="submit" class="btn btn-primary col">Update</button>
	</div>

</form>


@endsection
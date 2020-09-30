@extends('layouts.app')
@section('content')


<div class="row">
	<div class="col">
		<div class="pull-left">
			<h2>Editar lista de compras</h2>
		</div>
	</div>
</div>

<form  action="{{ route('compras.update',$compra->id) }}" method="POST">
	@csrf
	@method('PUT')

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Name:</strong>
				<input type="text" name="name" class="form-control" value= "{{ $compra->name }}">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Description:</strong>
				<textarea class="form-control" name="description" >{{ $compra->description }}</textarea>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Price:</strong>
				<textarea class="form-control" name="price" >{{ $compra->price }}</textarea>
			</div>
		</div>
	</div>

	<div class="col text-center">
		<button type="submit" class="btn btn-primary col">Update</button>
	</div>

</form>


@endsection
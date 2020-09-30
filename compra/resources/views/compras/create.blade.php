@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div>
			<h2>Nova lista de compra</h2>
		</div>
	</div>
</div>


<form action="{{ route('compras.store') }}" method="POST">
	@csrf

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Name:</strong>
				<input type="text" name="name" class="form-control">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Description:</strong>
				<textarea class="form-control" name="description"></textarea>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="form-group">
				<strong>Price:</strong>
				<input type="text" name="price" class="form-control">
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
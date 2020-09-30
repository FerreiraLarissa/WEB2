@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col">
		<div class="pull-left">
			<h2>Mostrar lista de compras</h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Author:</strong>
			{{ $compra->user->name }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Name:</strong>
			{{ $compra->name }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group"></div>
		<strong>Description:</strong>
		{{ $compra->description }}
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Price</strong>
			{{ $compra->price }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Created:</strong>
			{{ $compra->created_at }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Updated:</strong>
			{{ $compra->updated_at }}
		</div>
	</div>
</div>






@endsection
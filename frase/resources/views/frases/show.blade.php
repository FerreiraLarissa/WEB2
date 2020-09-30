@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col">
		<div class="pull-left">
			<h2>Mostrar frases</h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Id:</strong>
			{{ $frase->id }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Author:</strong>
			{{ $frase->user->name }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group"></div>
		<strong>Title:</strong>
		{{ $frase->title }}
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Body</strong>
			{{ $frase-> body }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Updated:</strong>
			{{ $frase-> updated_at }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="from-group">
			<strong>Created:</strong>
			{{ $frase-> created_at }}
		</div>
	</div>
</div>




@endsection
@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col">
		<div class="pull-left">
			<h2>Compra index</h2>
		</div>
	</div>
</div>

@if (session('sucess'))
		<div class="alert alert-sucess">
			{{ session('sucess')}}
		</div>
	@endif

@if (session('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif

<table class="table table-bordered">
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Author</th>
		<th>Created</th>
		<th>Updated</th>
		<th>Action</th>
	</tr>
	@foreach ($compras as $compra)
	<tr>
		<td>{{ $compra->id }}</td>
		<td>
			<a href="{{ url("/compras/{$compra->id}")  }}">
				{{$compra->name}}
			</a>
        </td>

        <td>{{ $compra->user->name }}</td>
		<td>{{ $compra->created_at }}</td>
		<td>{{ $compra->updated_at }}</td>

	      <td>
			<form action="{{ route('compras.destroy',$compra->id) }}" method="POST">

				<a class="btn btn-primary" href="{{ route('compras.show' ,$compra->id) }}">Show</a>
				<a class="btn btn-primary" href="{{route('compras.edit',$compra->id) }}"> Edit </a>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>

			</form>
		</td>
	</tr>
	@endforeach
</table>

{{ $compras->links() }}

@endsection
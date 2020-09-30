@extends('layouts.app')

@section('content')

@foreach ($compras as $compra)

     <div class="card">
         <div class="card-header">
             <h1>{{$compra->name}}</h1>
         </div>
         <div class="card-body">
             <h5 class="card-title">Author: {{$compra->user->name}} </h5>

             <a class="card-text">{{$compra->descprition}}</a>
         </div>
         <div class="card-footer text-muted">
             <div class="row">

                 <div class="col-6">Created: {{$compra->created_at}} </div>
                 <div class="col-6">Updated: {{$compra->updated_at}} </div>
             </div>
         </div>
     </div>

    @endforeach
       
    {{ $compras->links() }}

@endsection

@extends('layouts.app')

@section('content')

@foreach ($frases as $frase)

     <div class="card">
         <div class="card-header">
             <h1>{{$frase->title}}</h1>
         </div>

        @isset($frase->image)
        <img class="card-img-top" src="{{ asset('/storage/'.$frase->image->path) }}">
        @endisset
        
         <div class="card-body">
             <h5 class="card-title">Author: {{$frase->user->name}}</h5>

             <a class="card-text">{{$frase->body}}</a>
         </div>
         <div class="card-footer text-muted">
             <div class="row">

                 <div class="col-6">Created: {{$frase->created_at}}</div>
                 <div class="col-6">Updated: {{$frase->updated_at}}</div>
             </div>
         </div>
     </div>

    @endforeach
       
    {{ $frases->links() }}

@endsection

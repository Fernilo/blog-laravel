@extends('layouts.public')

@section('contenidoPrincipal')
<div class="row">
    <div class="col-12">
        <h1 class="text-center text-uppercase mt-2">Categoría:{{$categoria->nombre}}</h1>
    </div>
    
    <x-cards></x-cards>
</div>

@endsection
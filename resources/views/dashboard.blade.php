@extends('layouts.master')

@section('content')
<div class="d-inline-flex p-2 bg-body-dark text-white">
    <p class="h6"><a href="{{ route('dashboard') }}">Home</a></p>
</div>
    <div class="fluid bg-light">


        <div class="font-semibold text-xl ">
            <h1 class="text-center">"Nascer, morrer, renascer ainda e progredir sempre, tal é a lei"</h1>
            <p class="text-center">Allan Kardec</p>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <a href="#">
                <img class="rounded mx-auto d-block" src="{{ asset('img/livroEspiritos.jpg') }}" style="width: 10rem;">
            </a>
        </div>
    </div>
@endsection

@extends('layouts.master')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Home
    </h2>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <a href="#">
            <img class="rounded mx-auto d-block" src="{{ asset('img/livroEspiritos.jpg') }}" style="width: 10rem;">
        </a>
    </div>

    <div class="py-12">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h1 class="text-center">"Nascer, morrer, renascer ainda e progredir sempre, tal é a lei"</h1>
            <p class="text-center">Allan Kardec</p>
        </div>

    </div>
@endsection

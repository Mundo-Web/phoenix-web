@extends('components.public.matrixdemo', ['pagina' => 'construccion'])

@section('css_importados')
    <style>
         body {
            margin: 0;
            overflow: hidden;
        }

        #imagen-container {
            width: 100vw;
            height: 100vh;
            overflow: auto;
        }

        img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
@stop

@section('content')
    <main>
        <div id="imagen-container">
            <img class="h-full" src="{{asset('images/imagen/construcction.png')}}" alt="imagen">
        </div>
    </main>
@section('scripts_importados')

@stop

@stop
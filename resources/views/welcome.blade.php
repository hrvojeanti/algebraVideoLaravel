<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">


@extends('layouts.app')

@section('content')


    <body>
        <div class="flex-center position-ref full-height">
          

            <div class="content">
                <div class="title m-b-md">
                    Videoteka
                </div>

                <div class="links">
                    <a href="{{ url('filmovi') }}">Filmovi</a>
                    <a href="{{ url('filmovi/create')}}">Unos</a>
                    <a href="https://github.com/hrvojeanti">Hrvoje GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>

@endsection
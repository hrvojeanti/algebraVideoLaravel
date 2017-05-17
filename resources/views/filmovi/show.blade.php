<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">


@extends('layouts.app')

@section('content')


<div class="container" id="filmovi">
	<h3>Filmovi</h3>


<span> | <a href="{{ url('filmovi') }} ">SVI</a> | </span>
@for($letter = 'A', $i=1; $i<=26; $i++, $letter++)
	<span><a href="/filmovi/{{ $letter }}" >  {{ $letter }}  </a> | </span>

@endfor



@foreach($film as $nes) 

	<h4><img src="/images/{{ $nes->slika }}" class="img-rounded slika" width="120" height="180" ></h4>
	<h4>{{ $nes->naziv }} ({{ $nes->godina }})</h4>
	<h4>Trajanje: {{ $nes->trajanje }} min</h4>
@endforeach

@endsection
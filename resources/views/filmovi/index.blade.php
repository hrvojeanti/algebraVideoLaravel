<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">


@extends('layouts.app')

@section('content')


<div class="container" id="filmovi">
	<h3>Filmovi</h3>


<span> | <a href=" {{ url('filmovi') }} ">SVI</a> | </span>
@for($letter = 'A', $i=1; $i<=26; $i++, $letter++)
	<span><a href="/filmovi/{{ $letter }}" >  {{ $letter }}  </a> | </span>

@endfor

<table class="table">
	<thead>
		<tr>
			<th>Slika</th>
			<th>Naslov Filma</th>
			<th>Godina</th>
			<th>Trajanje</th>
			<th>Akcija</th>
		</tr>
	</thead>
	<tbody>

@foreach($filmovi as $film)
	<tr>
		<td> <img src="/images/{{ $film->slika }}" class="img-rounded slika" width="120" height="180" ></td>
		<td> {{ $film->naziv }} </td>
		<td> {{ $film->godina }} </td>
		<td> {{ $film->trajanje }} </td>
		@if (Auth::guest())
			<td>Moras biti u logiran da bi brisao</td>
		@else
		<td> <form action="/filmovi/{{$film->naziv}}" method="POST">
			{{csrf_field()}}

		<input type="hidden" name="_method" value="DELETE"/>
		<button type="submit" class="btn btn-primary">Brisi</button> </form></td>
		@endif
	</tr>

@endforeach
	</tbody>
</table>

</div>
@endsection
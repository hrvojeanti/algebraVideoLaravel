<?php
use App\Zanr;

?>


@extends('layouts.app')

@section('content')

@if (Auth::guest())
	<h3 style="text-align:center;">Moras biti u logiran da bi unosio filmove</h3>

@else

<div class="container">
	<h4>Dodaj film:</h4>
	<form  name="Form" method="POST" action="/filmovi" enctype="multipart/form-data" onsubmit="return validateForm()" >
	{{csrf_field()}}
		<div class="form-group">
			<label for="naslov">Naslov:</label>
			<input type="text" class="form-control" value="upisite naslov" name="naziv" /><br/>

			<label for="zanr">Žanr:</label>
			<select class="form-control" name='zanr_id'>
				@foreach(Zanr::all() as $zanr)
					<option value="{{ $zanr->id }}"> {{ $zanr->naziv }}  </option>;
				@endforeach
			</select><br/>

			<label for="zanr">Godina:</label>
			<select class="form-control" name='godina'>
			@for ($i = 2017; $i >= 1900; $i--)
    		<option value= {{ $i }} > {{ $i }} </option>;
			@endfor
			
			</select><br/>

			<label for="trajanje">Trajanje:</label>
			<input type="number" class="form-control" name="trajanje" min="1" max="999" /><br/><br/>

			<label for="exampleInputFile">Dodaj sliku:</label>
    	<input type="file" class="form-control-file" name="slika"><br/>

			<button type="submit" class="btn btn-primary">Dodaj film</button>		
		</div>
		
	</form>
</div>


<div class="container">
	<h4>Dodaj jos zanrova:</h4>
	<form id="form_zanr" action="/filmovi" method="POST" onsubmit="return validateForm2()">
			{{csrf_field()}}

		<div class="form-group">
			<input type="text" class="form-control" name="unos_zanr" />
			<br/>

			<button type="submit" class="btn btn-primary">Dodaj zanr</button>
		</div>
	</form>
</div>


@endif

<script type="text/javascript">
    function validateForm()
    {
    var a=document.forms["Form"]["naziv"].value;
    var b=document.forms["Form"]["zanr_id"].value;
    var c=document.forms["Form"]["godina"].value;
    var d=document.forms["Form"]["trajanje"].value;
    var e=document.forms["Form"]["slika"].value;
    if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="", e==null|| e=="")
      {
      alert("Ispuni sva polja");
      return false;
      }
    }

    function validateForm2()
    {
    var a=document.forms["Form"]["unos_zanr"].value;

    if (a==null || a=="")
      {
      alert("Upisi zanr");
      return false;
      }
    }


</script>
@endsection

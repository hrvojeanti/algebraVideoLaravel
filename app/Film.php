<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
	protected $fillable = ['godina', 'naziv', 'slika', 'trajanje', 'zanr_id'];
}

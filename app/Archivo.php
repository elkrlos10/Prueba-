<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable =['id','nombre','propietario','peso','fecha','ruta'];
}

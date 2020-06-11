<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['nombre', 'apellido', 'cedula', 'nacimiento', 'telefono', 'esAdmin', 'email'];
}

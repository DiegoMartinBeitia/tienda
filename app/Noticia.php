<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descripcion', 'urlImg',
    ];

}

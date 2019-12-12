<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //

    protected $fillable = ['fecha_inicio', 'fecha_fin', 'decripcion', 'paciente_id'];


    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
}

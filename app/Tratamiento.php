<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //

    protected $fillable = ['fecha_inicio', 'fecha_fin', 'descripcion','medicina_id', 'paciente_id'];


    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function medicaciones()
    {
        return $this->hasMany('App\Medicacion');
    }

    public function medicina()
    {
        return $this->belongsTo('App\Medicina');
    }

}

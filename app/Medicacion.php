<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicacion extends Model
{
    //
    protected $fillable = ['unidades', 'frecuencia', 'instrucciones', 'tratamiento_id', 'medicina_id'];

    public function tratamiento()
    {
        return $this->belongsTo('App\Tratamiento');
    }

    public function medicina()
    {
        return $this->belongsTo('App\Medicina');
    }
}

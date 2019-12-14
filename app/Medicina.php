<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicina extends Model
{
    protected $fillable = ['name', 'composition', 'presentation', 'link'];

    public function medicaciones()
    {
        return $this->hasMany('App\Medicacion');
    }
}

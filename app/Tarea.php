<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //

    public function trabajo(){
        return $this->belongsTo('App\Trabajo');
    }
}

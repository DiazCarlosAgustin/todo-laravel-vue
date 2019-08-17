<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $table = 'trabajos';
    protected $filetable = array('iniciales','nombre');

    //relacion con user 
    public function user(){
        return $this->belongsTo('App\User');
    }

    // relacion con tareas
    public function tareas(){
        return $this->hasMany('App\Tarea');
    }

}

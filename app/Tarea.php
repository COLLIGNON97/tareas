<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //Forma de rellenar datos a la base de datos de manera masiva "Mass Assignment"
    protected $fillable = [
        'categoria_id',
        'user_id',
        'nombre_tarea',
        'fecha_inicio',
        'fecha_termino',
        'descripcion',
        'prioridad'];

    protected $dates = ['fecha_inicio', 'fecha_termino', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

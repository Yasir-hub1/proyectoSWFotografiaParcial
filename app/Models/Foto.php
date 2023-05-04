<?php

namespace App\Models;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';
    protected $fillable = [
        'imagen',
    ];

    /*public function Album() {
        return $this->belongsTo(Album::class, 'evento_id');
    }

    public function fotografo(){
        return $this->belongsTo(Fotografo::class,'fotografo_id');
    }*/ /////////////////

    /*public function detalles_compra(){
        return $this->belongsTo(DetalleOrdenCompra::class,'foto_id');
    }*/
     //TODO: relacion de 1 evento tiene muchas fotos
    public function evento(){
        return $this->hasOne(Evento::class);
    }
}

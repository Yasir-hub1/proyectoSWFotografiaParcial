<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'fecha',
        'hora',
        'precio',
        'estado',
        'code_qr',
        'user_id',
        'fotos_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function album(){
        return $this->hasOne(Album::class);
    }

    public function foto(){
        return $this->belongsTo(Foto::class);
    }
}

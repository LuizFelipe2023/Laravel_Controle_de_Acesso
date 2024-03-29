<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    protected $fillable = ['user_id','nome_usuario', 'data_entrada','data_saida', 'hora_entrada', 'hora_saida'];

    public function user(){
           return $this->belongsTo(User::class);
    }
}

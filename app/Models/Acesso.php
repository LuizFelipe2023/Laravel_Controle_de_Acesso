<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    use HasFactory;

    protected $fillable = ['nome_pessoa','assunto','cpf','data','hora_entrada','hora_saida','destino'];
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardapioMesa extends Model
{
    use HasFactory;
    protected $table = 'cardapio_mesa';
    protected $fillable = ["mesas_id", "cardapio_id"];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;
    protected $table = 'cardapios';
    protected $fillable = ["nome", "preco", "descricao", "user_id"];

    public function mesa(){
        return $this->belongsToMany(Mesas::class, 'cardapio_mesa');
    }
}

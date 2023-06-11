<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cardapio;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mesas extends Model
{
    use HasFactory;
    protected $table = 'mesas';
    protected $fillable = ["numero", "estatus", "taxa", "user_id"];


    public function cardapios(): BelongsToMany
    {
        return $this->belongsToMany(Cardapio::class, 'cardapio_mesa');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}

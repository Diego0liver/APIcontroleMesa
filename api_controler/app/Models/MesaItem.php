<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaItem extends Model
{
    use HasFactory;
    protected $fillable = ["mesa_id", "item_id"];
}

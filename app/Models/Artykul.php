<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artykul extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        "tytul",
        "autor",
        "zawartosc"
    ];
}

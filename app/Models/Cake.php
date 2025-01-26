<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'recipe',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

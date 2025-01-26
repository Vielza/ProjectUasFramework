<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['cake_id', 'user_id', 'like'];

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

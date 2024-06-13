<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registion extends Model
{
    use HasFactory;
    protected $fillable = ['name','surname','year','experience','direction','email','password'];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }
}

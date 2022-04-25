<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}

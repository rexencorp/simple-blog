<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'artikel_id',
        'comment',
        'comment_id'
    ];


    public function article() {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }


    public function comments() {
        return $this->hasMany(Komentar::class, 'comment_id');
    }


    public function user() {
        return $this->belongsTo(User::class);
    }
}

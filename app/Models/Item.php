<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'obtained' ,
        'image',
        'timestamps'

    ];

    public function comments() {
        return $this -> hasMany(Comment::class, 'id');
    }

    public function labels() {
        return $this -> belongsToMany(Label::class);
    }
}

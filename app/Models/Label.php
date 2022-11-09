<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labek extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'display',
        'color',
        'timestamps'

    ];

    public function items() {
        return $this -> hasMany(Label::class)->withTimesStamps();
    }
}
}




<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';
    public $timestamps = true;
    protected $fillable = [
        'photo_details','page','pages','perpage','total'
    ];

    protected $casts = [
        'photo_details' => 'array'
    ];
}

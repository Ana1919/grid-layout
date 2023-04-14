<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    public $timestamps = true;
    protected $fillable = [
        'photo_id','size_details','canblog','canprint','candownload'
    ];

    protected $casts = [
        'size_details' => 'array'
    ];
}

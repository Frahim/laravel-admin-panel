<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $table = 'brands_tabils';

    protected $fillable =[
        'name',
        'slug',
        'description',
        'other_description',
        'logo',
        'Vedio',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];
}

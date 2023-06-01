<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'slug',
        'date',
        'price',
        'meta_keywords',
        'summary',
        'description',
        'image',
        'image1',
        'image2',
        'image3',
        'page_visit',
        'posted_by',
        'category_id',

    ];
    public function getTitleAttribute($value){
        return Str::title($value);
    }
}

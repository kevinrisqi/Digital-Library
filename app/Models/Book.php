<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'quantity',
        'image',
        'author',
        'publisher',
        'abstract',
        'isbn',
    ];

    public function category (){
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'taxonomy_id',
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Taxonomy extends Model
{
    use HasFactory;

    protected $table = 'taxonomies';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'taxonomy_id', 'id');
    }


}

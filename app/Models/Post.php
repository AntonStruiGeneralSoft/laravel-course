<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Traits\Filterable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; // мягкое удаление
    use Filterable;
    

    protected $table = 'posts'; // указывает таблицу с которой связана модель
    protected $fillable = [ // дает разрешения на изменения полей 
        'title',
        'content',
        'img',
        'likes',
        'is_published',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
        //return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
        //return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title','slug','feature_image','category_id','user_id','content'
    ];

    protected $dates = ['dateted_at'];

    public function getFeatureImageAttribute($feature_image) {
        return asset('/uploads/posts/'.$feature_image);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'name');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}

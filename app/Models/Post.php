<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title','slug','feature_image','category_id','content'
    ];

    protected $dates = ['dateted_at'];

    public function getFeatureImageAttribute($feature_image) {
        return asset('/uploads/posts/'.$feature_image);
    }

    public function category() {
        return $this->blongsTo('App\Model\Category');
    }
}

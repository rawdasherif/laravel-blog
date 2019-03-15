<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use Sluggable;
    
    protected $fillable=[
    'title',
    'description',
    'user_id'
    ];

    public function user() {
        return $this ->belongsTo ('App\User');
    }


    // public function getCreatedAtAttribute($value)
    // {
    //    return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('l jS \of F Y h:i:s A');
    // }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

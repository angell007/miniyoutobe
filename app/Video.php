<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->title);
        });
    }

    protected $fillable = [

        'user_id' ,
        'slug',
        'title'	,
        'description',
        'status'	,
        'image'	,
        'video_path' 
    ];
}

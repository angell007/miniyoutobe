<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [

        'user_id' ,
        'title'	,
        'description',
        'status'	,
        'image'	,
        'video_path' 
    ];
}

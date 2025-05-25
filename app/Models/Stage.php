<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    //

    protected $guarded = [];
    public static function getTagById($tag)
    {
        $stage = self::where('tag', $tag)->first();
        return $stage->id;
    }
}

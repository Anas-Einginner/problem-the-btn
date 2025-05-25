<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    //
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    static public function getQualBuCode($code)
    {
        if ($code == 'dr') {
            return 'دكتوراه';
        } elseif ($code == 'm') {
            return 'ماجستير';
        } elseif($code == 'b') {
            return 'بكالوريوس';
        }
        return 'دبلوم';
    }
}

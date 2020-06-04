<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model // returns role properties from role table and compares roles id with user table and display
{
    public function user() 
    {
       return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'description','recieved_id','origin','start','end','location','post_id'
       
    ];
    function getRequirements()
    {
        return $this->hasMany('App\Models\PostRequirement');
    }
}

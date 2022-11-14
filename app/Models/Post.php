<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'type', 'description', 'recieved_id', 'origin', 'start', 'end', 'location', 'post_id', 'item_name', 'quantity'

    ];
    function getRequirements()
    {
        return $this->hasMany('App\Models\PostRequirement');
    }
}

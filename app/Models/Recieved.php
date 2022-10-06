<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostRequirement;
class Recieved extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin', 'description', 'status','type','start','end','location'
    ];
    function getRequirements()
    {
        return $this->hasMany('App\Models\PostRequirement');
    }
}

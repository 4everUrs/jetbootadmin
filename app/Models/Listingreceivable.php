<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listingreceivable extends Model
{
    use HasFactory;
    protected $fillable = [
        'lrname','lrattachment','lrremarks','lrstatus'
    ]; 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'position', 'department', 'monday', 'tuesday', 'wednesday','thursday', 'friday', 'saturday','sunday',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logisticannual extends Model
{
    use HasFactory;
    protected $fillable = [
        'lyear','ldeptbudget', 'lobudget', 'lfbudget','lcbudget', 'llbudget', 'lsbudget'
    ];
}

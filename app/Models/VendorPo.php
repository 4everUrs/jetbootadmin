<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPo extends Model
{
    use HasFactory;
    protected $fillable = ['po_id', 'file_name', 'user_id'];
}

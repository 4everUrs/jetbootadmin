<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iinterview extends Model
{
    use HasFactory;
    protected $fillable =[
        'applicant_list_id','status'
    ];
    public function ApplicantList()
    {
        return $this->belongsTo(ApplicantList::class);
    }
}

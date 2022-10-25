<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone','status','email','joblist_id','sss','philhealth','pagibig','method','bank_name','bank_account'
    ];
    public function Joblist(){
        return $this->belongsTo(JobList::class);
    }
}

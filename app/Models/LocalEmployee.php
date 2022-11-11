<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone','status','email','create_job_id','sss','philhealth','pagibig','method','bank_name','bank_account'
    ];
    public function CreateJob(){
        return $this->belongsTo(CreateJob::class);
    }
}

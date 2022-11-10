<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'position', 'salary', 'details', 'location', 'applicants','client_id','status','daily_salary','collection'
    ];
    public function Client(){
        return $this->belongsTo(Client::class);
    }
}

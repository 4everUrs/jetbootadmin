<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestNotification extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'user_id', 'sender', 'reciever', 'request_content', 'routes', 'department'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

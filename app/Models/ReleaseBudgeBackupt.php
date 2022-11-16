<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleaseBudget extends Model
{
    use HasFactory;
    protected $fillable = [
        'rcategory', 'raccount', 'rstatus', 'list_requested_id'
    ];
    public function ListRequested()
    {
        return $this->belongsTo(ListRequested::class);
    }
}

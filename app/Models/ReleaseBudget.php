<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleaseBudget extends Model
{
    use HasFactory;
    protected $fillable = [
        'rdescription', 'rpaymenttype', 'rstatus', 'list_requested_id'
    ];
    public function ListRequested()
    {
        return $this->belongsTo(ListRequested::class);
    }
}

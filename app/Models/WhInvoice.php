<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'procurement_invoice_id', 'post_id', 'company_name', 'file_name', 'status', 'bidder_id'
    ];
    public function Bidder()
    {
        return $this->belongsTo(Bidder::class);
    }
    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}

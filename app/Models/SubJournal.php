<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubJournal extends Model
{
    use HasFactory;
     protected $fillable = [
        'jdescription', 'jdebit', 'jcredit','jencoded','journal_entry_id','jsubdescription'
    ]; 
}

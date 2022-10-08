<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'jdescription', 'jdebit', 'jcredit','jencoded','journal_entry_id','created_at'
    ]; 
    function subjournal()
    {
        return $this->hasMany('App\Models\SubJournal');
    }
}

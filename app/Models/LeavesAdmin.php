<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeavesAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'medname',
        'drugtype',
        'contact_num',
        'from_date',
        'to_date',
        'dosage',
        'freqency',
        'day',
        
    ];
}

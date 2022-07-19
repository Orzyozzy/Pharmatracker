<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeavesAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'rec_id',
        'leave_type',
        'time',
        'from_date',
        'to_date',
        'day',
        
    ];
}

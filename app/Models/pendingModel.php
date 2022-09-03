<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendingModel extends Model
{
    protected $table = 'pending';
    protected $primaryKey = 'pending_id';
    public $timestamps = false;

    protected $fillable = [
        'pending_user',
        'pending_date',
        'pending_status',
        'status',
        'pending_amount',
        'user_id'
    ];
}

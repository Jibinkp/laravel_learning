<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginModel extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'login_id';
    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'user_email',
        'user_password'
    ];
}

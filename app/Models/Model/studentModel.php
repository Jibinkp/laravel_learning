<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentModel extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'student_id';
    public $timestamps = false;

    protected $fillable = [
        'student_name',
        'student_mark',
        'student_subject'
    ];
}

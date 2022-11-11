<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'enroll';
    protected $primaryKey = 'enrollid';
    protected $fillable = [
        'enrollid',
        'trainingid',
        'courseid',
        'date'
    ];
}

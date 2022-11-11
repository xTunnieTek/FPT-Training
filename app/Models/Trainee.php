<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;
    protected $table = 'trainingid';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'google_id',
        'skill',
        'toiec',
        'exp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

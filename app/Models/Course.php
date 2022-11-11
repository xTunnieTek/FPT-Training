<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
        public $timestamps = false;

    protected $primaryKey = 'courseid';

    protected $fillable = [
        'courseid',
        'coursename',
        'startdate',
        'description',
        'image',
        'trainer',
        'categoryid',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function topic(){
        return $this->hasMany(Topic::class);
    }
}

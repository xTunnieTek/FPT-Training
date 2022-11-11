<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topics';
    public $timestamps = false;

    protected $primaryKey = 'topicid';

    protected $fillable = [
        'courseid',
        'topicid',
        'title',
        'about',
        'link',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'likes'
    ];
    // you need anyone, either $fillable or $guarded
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function commentBoxes()
    {
        return $this->hasMany(CommentBox::class);
    }
}

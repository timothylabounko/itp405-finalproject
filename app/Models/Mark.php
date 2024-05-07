<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'comment_id', 
    ];

    // Define relationship with Viewer
    public function viewer()
    {
        return $this->belongsTo(Viewer::class, 'user_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

}

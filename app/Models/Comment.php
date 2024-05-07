<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'viewer_id', 
        'body',
    ];

    /**
     * Get the viewer that owns the comment.
     */
    public function viewer()
    {
        return $this->belongsTo(Viewer::class);
    }
}

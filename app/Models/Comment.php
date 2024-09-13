<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function articles()
    {
        $this->belongsTo(Article::class);
    }

    protected $fillable = [
        'article_id',
        'comment',
        'name',
    ];
}

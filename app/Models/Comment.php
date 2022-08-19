<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body','product_id','commented_by'];


    public function commentedBy()
    {
        return $this->belongsTo(User::class, 'commented_by');
    }
}

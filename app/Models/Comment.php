<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_id',
        'text',
        'user_id'
    ];
    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

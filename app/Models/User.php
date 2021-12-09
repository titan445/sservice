<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public function show_requests(){
        return \json_encode($this->requests->get(['id','name']));
    }
}

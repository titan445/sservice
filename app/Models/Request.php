<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as Req;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'admin_id',
        'description',
        'name',
        'is_closed'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(User::class);
    }

    public function get_request()
    {
        $responce =[];
        $responce['admin'] = $this->admin()->first()->name;
        $responce['user'] = $this->user()->first()->name;
        $responce['name'] = $this->name;
        $responce['description'] = $this->description;
        $responce['is_closed'] = $this->is_closed;
        $responce['comments'] = $this->comments()->get(['id','text']);
        return \json_encode($responce);
    }
    public function set_data(Req $request, User $user)
    {
        $this->user_id = $user->id;
        $this->admin_id = rand(1, 3);
        $this->description = $request->description;
        $this->name = $request->name;
    }
    public function add_comment(Req $request, User $user)
    {
        $comment = new Comment;
        $comment->user_id = $user->id;
        $comment->text = $request->text;
        $this->comments()->save($comment);
    }
    public function close()
    {
        $this->is_closed = true;
    }
}

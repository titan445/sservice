<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Request as Item;

class VRequestController extends Controller
{
    public function index(Request $request, User $user){
        $requests = $user->requests->get();
        return view('main', [
            'requests'=> $requests
        ]);
    }
    public function show(Request $request, Item $item){
        return view('request', [
            'request'=> $item
        ]);
    }
}

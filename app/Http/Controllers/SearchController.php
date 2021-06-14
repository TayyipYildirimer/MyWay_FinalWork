<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('search.search',['users' => $users]);
    }
}

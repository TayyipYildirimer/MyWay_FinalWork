<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function store(Request $request)
    {
        return SocialMedia::create($request->all());
    }
}

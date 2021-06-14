<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userPhoto;
use App\Models\Project;
use App\Models\SocialMedia;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index($id) {
        $user = User::where('id', $id)->first();
        $userPhoto = userPhoto::where("user_id",$id)->get();
        $project = Project::where("user_id",$id)->get();
        $socialMedia = SocialMedia::where("user_id",$id)
                                    ->latest()
                                    ->select('instagram', 'facebook', 'pinterest', 'linkedin', 'twitter', 'other')
                                    ->first();
        //return view('portfolios.portfolio')->with(['user'=> $user, 'userPhoto'=> $userPhoto]);
        return view('portfolios.portfolio', compact('user', 'userPhoto', 'project', 'socialMedia'));
    }
}

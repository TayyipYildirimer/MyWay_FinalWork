<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        return Project::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $product = Project::find($id);
        $product->update($request->all());
        return ["status"=>true];
    }
}


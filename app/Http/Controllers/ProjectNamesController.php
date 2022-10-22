<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectName;

class ProjectNamesController extends Controller
{

    public function getProjectNames()
    {
        $projectDetails = ProjectName::get();
        
        $user = auth()->user();
        $user_id = $user->id;
        return view('projectData.index', compact('projectDetails', 'user_id'));
    }

    public function create($user_id)
    {
        return view('projectData.create', compact('user_id'));
    }

    public function store(Request $request, $id = '')
    {
        $params = $request->all();
        $user_id = $params['user_id'];
        ProjectName::updateOrCreate(
            [
                'id' => $id,
            ],

            $params

        );
        
        $projectDetails = ProjectName::get();
        return view('projectData.index', compact('projectDetails','user_id'));
    }
}

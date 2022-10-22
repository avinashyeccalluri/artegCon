<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;      

class CategoryController extends Controller
{

    
    public function getCategories($project_id)
    {
        return view('category.categories', compact('project_id'));
    }

    
    public function postCategories(Request $request, $id = '')
    {


        if (Auth::check()) {
            $user = auth()->user();
            $params = $request->all();
            $params['user_id'] = $user->id;
            $data = Categories::updateOrCreate(
                [
                    'id' => $id,
                ],

                $params

            );

            return redirect(route('web.auth.index', $params['project_id']));
        } else {
            return redirect(route('web.auth.login.get'));
        }
    }


    
}

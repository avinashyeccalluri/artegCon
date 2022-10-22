<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategories;

class SubCategoryController extends Controller
{

    public function getSubCategories(Request $request)
    {
        $params = $request->all();
        // dd($params);
        $project_id = $params['project_id'];
        $category_id = $params['category_id'];
        // dd($project_id, $category_id);
        $subCategories = Categories::where(['project_id'=> $project_id, 'parent_id'=>$category_id])->get();
        return view('subCategory.index', compact('subCategories','project_id','category_id'));
    }

    public function create(Request $request){
        $params = $request->all();
        $project_id = $params['project_id'];
        $category_id = $params['category_id'];
        return view('subCategory.create', compact('project_id' , 'category_id'));
    }

    public function store(Request $request , $category_id = '', $id= ''){
        $params = $request->all();
        $category_id = $params['parent_id'];
        $project_id = $params['project_id'];
        $user = auth()->user();
        $params['user_id'] = $user->id;
        // dd($params);
        Categories::updateOrCreate(
            [
                'id'=> $id
            ],

            $params
        );

        return redirect(route('web.sub_category.get',['project_id'=>$project_id , 'category_id'=>$category_id]));
    }
    
    
}

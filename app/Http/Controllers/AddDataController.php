<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\LabourFair;
use App\Models\SubCategories;
use Carbon\Carbon;

class AddDataController extends Controller
{

    public function index(){

        $labourTypes = Categories::get();
        
        return view('addData.index', compact('labourTypes'));
    }

    public function getLabourData(Request $request){
        $params = $request->toArray();
        $category_id = $params['category_id'];
        $project_id = $params['project_id'];
        $specificSubCategories = Categories::where(['project_id'=> $project_id, 'parent_id' => $category_id ])->get();

        return view('addData.create', compact('specificSubCategories','category_id','project_id'));
        
    }

    public function postLabourData(Request $request , $module_id = ''){

        $params = $request->all();
        $category_id = $params['category_id'];
        $project_id = $params['project_id'];
        $sub_category_id = $params['sub_category_id'];
        $sub_category_name = $params['sub_category_name'];
        $fair = $params['fair'];
        $work_duration = $params['work_duration'];
        $no_of_labours = $params['no_of_labours'];
        $sub_category_id_length = count($sub_category_id);
        $user = auth()->user();
        for ($i=0; $i < $sub_category_id_length; $i++) { 
            $actualData = [
                'category_id'=> $category_id,
                'sub_category_name'=> $sub_category_name[$i],
                'project_id'=> $project_id,
                'sub_category_id'=> $sub_category_id[$i],
                'sub_category'=> Categories::where(['id'=> $category_id])->first()->category,
                'fair'=> $fair[$i],
                'work_duration'=> $work_duration[$i],
                'no_of_labours'=> $no_of_labours[$i],
                'user_id'=> $user->id,
            ];
            LabourFair::create($actualData);
        }
        return redirect(route('web.auth.index', $params['project_id'],'project_id'));
    }

    public function getEntries(Request $request){
        $params = $request->all();
        $duration = isset($params['duration']) ? (int) $params['duration'] : 7 ;
        $date = Carbon::now()->subDays($duration);
        $labourFairs = LabourFair::whereDate('created_at', '>=', $date)->where(['project_id'=> $params['project_id']])->get()->toArray();
        $entryTypes = [] ;
        foreach($labourFairs as $labourFair){
            $entryTypes = array_merge($entryTypes , collect($labourFair['sub_category_name'])->countBy()->all() );
        }

        return view('getEntries.index', compact('entryTypes','labourFairs','duration'));
        
    }
    
    
    
    
}

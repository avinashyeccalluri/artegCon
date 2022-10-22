<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;

class AuthController extends Controller
{


    public function index()
    {
        return view('auth.signIn');
    }

    public function create()
    {

        return view('auth.create');
    }

    public function store(Request $request, $id = '')
    {

        $params = $request->all();
        $params['password'] = Hash::make($params['password']);


        User::updateOrCreate(
            [
                'id' => $id,
            ],

            $params

        );


        return redirect(route('web.auth.login.get'));
    }


    public function login(Request $request)
    {


        $credentials = $request->only('user_name', 'password');
        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            $userID = $user->id;
            // return view('projectData.index', compact('userID'));
            return redirect(route('web.get_project_name_list'))->with(['userId'=> $userID]);
        } else {
            return redirect(route('web.auth.login.get'));
        }
    }

    public function postLogInIndex($project_id)
    {
        if (Auth::check()) {
            
            $user = auth()->user();
            $userID = $user->id;
            
            $categories = Categories::where(['project_id'=> $project_id,])->get()->whereNull('parent_id');
            return view('auth.list', compact('categories','project_id'));
        } else {
            return redirect(route('web.auth.login.get'));
        }
    }


    public function getCategoryList()
    {
        $categories = Categories::get();
        return view('category.categoryList', compact('categories'));
    }


    public function getEntries()
    {
        dd(34);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('web.auth.login.get'));
    }
}

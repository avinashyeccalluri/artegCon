<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::namespace('App\Http\Controllers')->name('web.')->group(function () {

    Route::get('/', 'AuthController@index')->name('auth.login.get');
    Route::post('/', 'AuthController@login')->name('auth.login.post');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
    Route::group(['middleware' => ['admin_auth']], function () {
        Route::get('/auth/create', 'AuthController@create')->name('auth.user.create');
        Route::post('/create', 'AuthController@store')->name('auth.user.store');
        // Route::get('/entries', 'AuthController@getEntries')->name('auth.entries.get');
        Route::post('/entries', 'AuthController@postEntries')->name('auth.entries.post');
        Route::get('/options/{project_id?}', 'AuthController@postLogInIndex')->name('auth.index');
        Route::get('/get_list', 'AuthController@getCategoryList')->name('auth.list.index');
        Route::get('/categories/{project_id?}', 'CategoryController@getCategories')->name('auth.categories.get');
        Route::post('/categories/{project_id?}', 'CategoryController@postCategories')->name('auth.categories.post');
        // Route::get('/main', 'CategoryCONtr')

        // sub category
        Route::get('/sub_category/create', 'SubCategoryController@create')->name('sub_category.create');
        Route::post('/sub_category/create', 'SubCategoryController@store')->name('sub_category.store');
        Route::get('/sub_category', 'SubCategoryController@getSubCategories')->name('sub_category.get');

        // add entries

        Route::get('/add_entries', 'AddDataController@index')->name('add_data');
        Route::get('/add_entries/index', 'AddDataController@getLabourData')->name('add_data.get');
        Route::post('/add_entries/index/{category_id}', 'AddDataController@postLabourData')->name('add_data.post');

        // get entries
        Route::get('/get_entries','AddDataController@getEntries')->name('get_entries');

        // project name
        Route::get('/get_project_names/create/{user_id}', 'ProjectNamesController@create')->name('get_project_name.get');
        Route::post('/get_project_names/create', 'ProjectNamesController@store')->name('get_project_name.post');
        Route::get('/get_project_names', 'ProjectNamesController@getProjectNames')->name('get_project_name_list');
        
    });




});

// Route::get('/auth', function(){
//     return view('auth.signIn');
// });

// Route::get('/auth/create', function(){
//     return view('auth.create');
// });
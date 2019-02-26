<?php

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


/*==Admin Linkes===================================================*/
Route::get('/', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect('/admin/home');
    } else {
        return redirect('/login');
    }
});


/*Auth=======*/
Route::group(['middleware' => ['locale'  ]], function () {
Auth::routes();
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//for permission ,'permission'
Route::group(['middleware' => ['auth', 'locale'  ], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {



    //
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/changelang/{locale}', 'HomeController@changeLang');
    /*Language=======*/
    Route::resource('language', 'LanguageController');
    Route::get('/destroyLang/{id}', 'LanguageController@destroyLang');
    /*Setting=======*/
    Route::any('/setting/{id}/edit', 'SettingController@edit');
    Route::any('/setting/update/{id}', 'SettingController@update');
    Route::any('/setting/delItem', 'SettingController@delItem');
    /*Translate=======*/
    Route::resource('translate', 'TranslateController');
    /*User Groups=======*/
    Route::resource('usergroups', 'UsergroupsController');
    Route::get('/delgroup/{id}', 'UsergroupsController@delgroup');
    /*Menu=======*/
    Route::resource('menu', 'MenuController');
    Route::get('/delmenu/{id}', 'MenuController@delmenu');
    /*Admin=======*/
    Route::resource('admin', 'AdminController');
    Route::get('/delAdmin/{id}', 'AdminController@delAdmin');

    Route::any('/error', 'HomeController@error');

    /*ProjectCat=======*/
    Route::resource('projectCat', 'ProjectCatController');
    /*Projects=======*/
    Route::resource('project', 'ProjectController');
    Route::get('delProject/{id}', 'ProjectController@delProject');
    Route::get('projectInCat/{id}', 'ProjectController@projectInCat');
    /*Finished Projects=======*/
    Route::any('finishedProjects', 'ProjectController@finishedProjects');
    /*project Electrical===========*/
    Route::resource('projectElectrical', 'ProjectElectricalController');
    /*update project cat ========*/
    Route::post('updateProjectCat', 'ProjectController@updateProjectCat');
    /*All Project=======*/
    Route::any('allProject', 'ProjectController@index');
    Route::any('searchProject', 'ProjectController@search');




    /*Category=======*/
    Route::resource('category', 'CateoryController');
    Route::get('/deleteCat/{id}', 'CateoryController@deleteCat');
    /*Site=======*/
    Route::resource('site', 'SiteController');
    Route::get('/delSite/{id}', 'SiteController@delSite');
    /*contractor=======*/
    Route::resource('contractor', 'ContractorController');
    Route::get('/delContractor/{id}', 'ContractorController@delContractor');
    /*Supervisor=======*/
    Route::resource('supervisor', 'SupervisorsController');
    Route::get('/delSupervisor/{id}', 'SupervisorsController@delSupervisor');
    /*Beneficiaries=======*/
    Route::resource('beneficiaries', 'BeneficiariesController');
    Route::get('/delBeneficiaries/{id}', 'BeneficiariesController@delBeneficiaries');

    /*Work Cat=============*/
    Route::resource('workCat', 'WorkCatController');
    Route::get('/delworkCat/{id}', 'WorkCatController@delworkCat');
    /*Work Request=============*/
    Route::resource('workRequest', 'WorkRequestController');
    Route::get('/delworkRequest/{id}', 'WorkRequestController@delworkRequest');
    /*Work Application=============*/
    Route::resource('workApplication', 'WorkApplicationController');
    Route::get('/delworkApp/{id}', 'WorkApplicationController@delworkApp');


    /*currncies=============*/
    Route::resource('currncies', 'CurrnciesController');
    Route::get('/delCurr/{id}', 'CurrnciesController@delCurr');

});



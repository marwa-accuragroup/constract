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
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth', 'locale'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/changelang/{locale}', 'SettingController@changeLang');
    /*Setting=======*/
    Route::any('/setting/{id}/edit', 'SettingController@edit');
    Route::any('/setting/update/{id}', 'SettingController@update');
    Route::any('/setting/delItem', 'SettingController@delItem');
    /*Language=======*/
    Route::resource('language', 'LanguageController');
    Route::get('/destroyLang/{id}', 'LanguageController@destroyLang');
    /*Slider=======*/
    Route::resource('slider', 'SliderController');
    Route::get('/deleteslider/{id}', 'SliderController@deleteslider');
    /*Pages=======*/
    Route::resource('page', 'PagesController');
    Route::get('/destroyPage/{id}', 'PagesController@destroyPage');
    /*Blog=======*/
    Route::resource('news', 'NewsController');
    Route::get('/deletenews/{id}', 'NewsController@deletenews');
    /* Message ========*/
    Route::get('message', 'MessageController@contactUs');
    Route::get('subscribe', 'MessageController@subscribe');
    Route::get('deletesubscribe/{id}', 'MessageController@deletesubscribe');
    /*Category=======*/
    Route::resource('category', 'CateoryController');
    Route::get('/deleteCat/{id}', 'CateoryController@deleteCat');

    /*User Groups=======*/
    Route::resource('usergroups', 'UsergroupsController');
    Route::get('/delgroup/{id}', 'UsergroupsController@delgroup');
    /*Menu=======*/
    Route::resource('menu', 'MenuController');
    Route::get('/delmenu/{id}', 'MenuController@delmenu');
    /*Admin=======*/
    Route::resource('admin', 'AdminController');
    Route::get('/delAdmin/{id}', 'AdminController@delAdmin');


});



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

Route::get('/', function () {
    return view('welcome');
});

/*
public function create(){
    return redirect('admin/profile/create');
}
*/
/*
admin/profile/edit にアクセスしたら
ProfileController の　edit Action に割り当たるように設定する
*/

Route::group(['prefix' => 'admin'], function(){
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
    
    /*------------Task4-start----------------------------------*/
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth');
    Route::get('profile', 'Admin\ProfileController@index')->middleware('auth');
    
    /*------------Task4-end------------------------------------*/
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    Route::post('profile/create', 'Admin\ProfileController@create')->middleware('auth');
    Route::get('profile/delete', 'Admin\ProfileController@delete')->middleware('auth');
    

});

/*
「http://XXXXXX.jp/XXX というアクセスが来たときに、 
AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください。
*/

/*------------Task3-start----------------------------------*/
Route::group(['prefix' => 'XXX'], function(){
    Route::get('bbb','Admin\AAAController@add');
});
/*------------Task3-end----------------------------------*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 追加
Route::get('/', 'NewsController@index');
Route::get('/profile', 'NewsController@profile');

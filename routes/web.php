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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::get('news', 'Admin\NewsController@index');
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete');
    
    /*------------Task4-start----------------------------------*/
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile', 'Admin\ProfileController@index');
    
    /*------------Task4-end------------------------------------*/
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/delete', 'Admin\ProfileController@delete');
    

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

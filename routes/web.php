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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    /*------------Task4-start----------------------------------*/
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    /*------------Task4-end------------------------------------*/
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
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

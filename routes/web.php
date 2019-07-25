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
    Route::get('news/create', 'Admin¥NewsController@add');
    /*------------Task4-start----------------------------------*/
    Route::get('profile/edit', 'Admin¥ProfileController@edit');
    /*------------Task4-end------------------------------------*/
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

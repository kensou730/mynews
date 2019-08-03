<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    //追加分
    public function add(){
        return view('admin.profile.create');
    }
    public function create(Request $request){
        
        // Validationを使う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $from = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($from['_token']);
        
        // データベースに保存する
        $profile->fill($from);
        $profile->save();
        

        return redirect('admin/profile/create');
    }
    public function edit(){
        return view('admin.profile.edit');
    }
    public function update(){
        return redirect('admin/profile/edit');
    }
}

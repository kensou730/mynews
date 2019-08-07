<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

// 以下を追記
use App\History;

use Carbon\Carbon;

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
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        

        return redirect('admin/profile/create');
    }
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if($cond_name != ''){
            $posts = Profile::where('name', $cond_name)->get();
        }else{
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }
    
    public function edit(Request $request){
        // Prorile Modelからデータを取得する
        $profile = Profile::find($request->id);
        if(empty($profile)){
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    public function update(Request $request){
        
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        $history = new History;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile');
    }
    public function delete(Request $request){
        
        //  該当するProfile Modelを取得
        $profile = Profile::find($request->id);
        //  削除
        $profile->delete();
        return redirect('admin/profile/');
    }
}

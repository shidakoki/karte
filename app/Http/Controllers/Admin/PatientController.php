<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;

class PatientController extends Controller
{
    public function add()
  {
      return view('admin.patient.create');
  }

  // 以下を追記
  public function create(Request $request)
  {
      // 以下を追記
      // Varidationを行う
      $this->validate($request, Patient::$rules);
      $patient= new Patient;
      $form = $request->all();
     
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $patient->fill($form);
      $patient->save();
      // admin/news/createにリダイレクトする
      return redirect('admin/patient/create');
  }  
  // 以下を追記
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Patient::where('name', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Patient::all();
      }
      return view('admin.patient.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
}

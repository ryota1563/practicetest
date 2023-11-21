<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use DB;
//DBへアクセスするため

class ProductController extends Controller
{
  public function showList() {
       $model = new Product();
       $products = $model->getList();

       $companies = DB::table('companies')->get();


       return view('list', ['products' => $products,'companies' => $companies]);
   }

public function index(Request $request)
{

    $keyword = $request->input('keyword');
    $selectsearch =$request->input('selectsearch');
    //セレクトボックスノ入力値を取得、変数化する必要がある。
    //その変数をindexnameを呼び出すときに$keywordと一緒に渡して、モデル側でも受け取れるようにする。

    $model = new Product();
    $products = $model->indexname($keyword,$selectsearch);

    $companies = DB::table('companies')->get();

    return view('list',['products' => $products,'keyword' => $keyword,'companies' => $companies]);
    //使用している変数数仁応じてcompact(一覧表示させるための中は変更する
}

public function create(Request $request)
{
 $companies = DB::table('companies')->get();

   return view('regist', ['companies' => $companies]);
}

public function registSubmit(Request $request) {


    // トランザクション開始
    DB::beginTransaction();


    try {
      $dir = 'sample';
      $test_image = $request->file('img_path');
      if($test_image){

        // sampleディレクトリに画像を保存publicサンプル中に
        $file_name = $request->file('img_path')->getClientOriginalName();
        $request->file('img_path')->storeAs('public/' . $dir, $file_name);
      }else{
        $file_name = null;
      }

        // 登録処理呼び出し
        $model = new Product();
        $model->registArticle($request, $file_name);


        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return back();
    }


    // 処理が完了したらregistにリダイレクト
    return redirect(route('regist'));
}

public function showDetail($id)
{
  $model = new Product();
  $product = $model->getname($id);

  return view('detail',['product' => $product]);

}



public function edit($id){

DB::beginTransaction();


try {
  $product = Product::find($id);
  $companies = DB::table('companies')->get();
  // dd($product);
  return view('edit',['message' =>'編集フォーム','product' => $product,'companies' => $companies]);
}catch (\Exception $e) {
    DB::rollback();
    return back();
}
}


public function update(Request $request, $id){

  $model = new Product();

  $dir = 'sample';

  $test_image = $request->file('img_path');

  DB::beginTransaction();
  try{
      if($test_image){

       // アップロードされたファイル名を取得
      $file_name = $request->file('img_path')->getClientOriginalName();
      $model->registupdate($request, $file_name, $id);
      $request->file('img_path')->storeAs('public/' . $dir, $file_name);

    }else{
      $model->imgupdate($request, $id);

    }

    DB::commit();
  }catch (\Exception $e) {
      DB::rollback();
      return back();
  }

    return redirect(route('edit',['id'=>$id]));
}

public function destroy($id){

DB::beginTransaction();


try{
    // 削除対象レコードを検索
    $product = Product::find($id);
    $product->delete();
    return redirect('list');
}catch (\Exception $e) {
    DB::rollback();
    return back();
}
}
}
// }

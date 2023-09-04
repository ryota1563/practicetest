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

    $query = Product::query();
//dd($query);
    if(!empty($keyword)) {
        $query->where('product_name', 'LIKE', "%{$keyword}%")
            ->orWhere('id', 'LIKE', "%{$keyword}%");
    }

    $products = $query->get();
    $companies = DB::table('companies')->get();

    return view('list',compact('products','keyword'),['companies' => $companies]);
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

        // sampleディレクトリに画像を保存publicサンプル中に
        $file_name = $request->file('img_path')->getClientOriginalName();
        $request->file('img_path')->storeAs('public/' . $dir, $file_name);

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
  $product = Product::find($id);


  return view('detail',['product' => $product]);

}



public function edit($id)
{
  $product = Product::find($id);
  $companies = DB::table('companies')->get();
  // dd($product);
  return view('edit',['message' =>'編集フォーム','product' => $product,'companies' => $companies]);
}


public function update(Request $request, $id)
{
  $product = Product::find($id);
  $dir = 'sample';

       // アップロードされたファイル名を取得
       $file_name = $request->file('image')->getClientOriginalName();

       // 取得したファイル名で保存
       $product->img_path = $request->file($request, $file_name)->storeAs($request, $file_name);

    $product->img_path = $request->input('img_path');
    $product->product_name = $request->input('product_name');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');
    $product->company_id = $request->input('company_id');

    $product->save();

    return redirect(route('edit',['id'=>$id]));
}

public function destroy($id)
{
    // 削除対象レコードを検索
    $product = Product::find($id);
    $product->delete();
    return redirect('list');
}
}
// }

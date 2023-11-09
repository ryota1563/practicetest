@extends('layouts.app')

@section('title', '商品管理画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1 style ="padding: 15px; background: #999">商品管理画面</h1>
        </div>
        <div>

                @csrf
                   <body>
                     <div>
                       <form action="{{ route('search')}}" method="GET">
                         <input type="text" name="keyword" value="">
                         <input type="submit" value="検索">
                      </div>


              <select name="selectsearch">
                <option value="">未選択</option>
                <!-- 未選択の場合、メーカー名のみも検索可能にする -->
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach

              </select>
            </form>


              <a href="{{ url('/regist') }}">新規登録</a>

              <table border ="1">
                <ul class ="target-area">
                    <tr>
                      <th>ID</th>
                      <th>商品画像</th>
                      <th>商品名</th>
                      <th>価格</th>
                      <th>在庫数</th>
                      <th>メーカー名</th>
                      <th>詳細表示</th>

                    </tr>

                    @foreach($products as $product)

                            <tr>
                              <th scope="row">{{ $product->id }}</th>
                              <td><img src="{{ asset('storage/sample/' . $product->img_path) }}" /></td>
                              <td>{{ $product->product_name }}</td>
                              <td>{{ $product->price }}</td>
                              <td>{{ $product->stock }}</td>
                              <td>{{ $product->company_name }}</td>


                <td><button type="button" class="btn btn-success" onclick="location.href='detail/{{$product->id}}'">詳細</button></td>

                <td>
                <form action="{{ route('destroy', ['id'=>$product->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')

                <button type="submit" class="btn btn-danger">削除</button>
                </form>
              </td>



                            @endforeach

                  </ul>
                </table>
               </body>
        </div>
    </div>
@endsection

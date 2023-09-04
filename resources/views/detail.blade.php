@extends('layouts.app')

@section('title', '商品情報詳細画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>商品詳細画面</h1>

                @csrf
                <div class="form-group">
                    <h2 class = "font-semibold text-xl text-gray-800 leading-tight">投稿の個別表示</h2>

                    <table class="table table-striped">
                    <thead>
                    <tr>
                    <th>id</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <th scope="row">{{ $product->id }}</th>
                      <td><img src="{{ asset('storage/sample/' . $product->img_path) }}" /></td>
                      <td>{{ $product->product_name }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->stock }}</td>

                  </tr>
                  </tbody>
                  </table>


                </div>
                <td><button type="button" class="btn btn-success" onclick="location.href='{{ route('edit', ['id' => $product->id]) }}'">詳細</button></td>

                <a href = "{{ url('/') }}"><button type="submit" class="btn btn-default">戻る</button></a>

              </div>

        </div>
    </div>
@endsection

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
                     <div class="user-search-form">
                       <form id="searchForm">
                         <input type="text" id="searchInput" placeholder="商品名を入力">
                         <button type="button" id="search_name"  class="btn search-icon">検索</button>
                      </div>


              <select name="selectsearch" id="selectSearch">
                <option value="">未選択</option>
                <!-- 未選択の場合、メーカー名のみも検索可能にする -->
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach

              </select>


              <div class="price.search">
                 <label for="price">{{ __('価格') }}</label>

                <div class="jougen">
                 <p>{{ __('上限') }}</p>
                  <input type="number" name="jougen-price" id="jougen-price" >
                </div>

               <div class="kagen">
                 <p>{{ __('下限') }}</p>
                 <input type="number" name="kagen-price" id="kagen-price" >
               </div>

              </div>

              <div class="stock.search">
                 <label for="price">{{ __('在庫') }}</label>

                <div class="jougen">
                 <p>{{ __('上限') }}</p>
                  <input type="number" name="jougen-stock" id="jougen-stock" >
                </div>

               <div class="kagen">
                 <p>{{ __('下限') }}</p>
                 <input type="number" name="kagen-stock" id="kagen-stock" >
               </div>

              </div>
            </form>


              <a href="{{ url('/regist') }}">新規登録</a>

              <div  id = "products-table">

              <table border ="1"  id="sorttable">
                <ul class ="target-area">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>商品画像</th>
                      <th>商品名</th>
                      <th>価格</th>
                      <th>在庫数</th>
                      <th>メーカー名</th>
                      <th>詳細表示</th>

                    </tr>

                  </thead>

                  <tbody>

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
                <form action="{{ route('destroy', ['id'=>$product->id]) }}" method="POST" >
                  @csrf
                  @method('DELETE')

                <input data-product_id="{{$product->id}}" type="submit" class="btn-dell" value="削除" >

                </form>
              </td>

            </tr>



                            @endforeach

                </tbody>

                  </ul>
                </table>

            </div>
               </body>
        </div>
    </div>
@endsection

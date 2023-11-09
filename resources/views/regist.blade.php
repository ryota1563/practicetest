@extends('layouts.app')

@section('title', '商品新規登録画面')

@section('content')

<div class="container">
     <div class="row">
       <div class="col-md-10 mt-6">
         <h1 class="mt4">商品新規登録画面</h1>

         <form action="{{ route('regist') }}" method="post" enctype="multipart/form-data">
             @csrf
             
             $initial_

             <div class="form-group">
                 <label for="product">商品名</label>
                 <input type="text" class="form-control" id="product" name="product_name" placeholder="商品名" value="{{ old('product') }}">

             </div>

             <select name="company_id">
               @foreach($companies as $company)
               <option value="{{ $company->id }}">{{ $company->company_name }}</option>
               @endforeach

             </select>

             <div class="form-group">
                 <label for="price">価格</label>
                 <input type="text" class="form-control" id="price" name="price" placeholder="価格" value="{{ old('price') }}">

             </div>

             <div class="form-group">
                 <label for="stock">在庫数</label>
                 <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数" value="{{ old('stock') }}">

             </div>

             <div class="form-group">
             <label for="comment">コメント</label>
             <textarea class="form-control" id="comment" name="comment" placeholder="Comment">{{ old('comment') }}</textarea>


             <div>
              <button type="submit" class="btn btn-default">{{ __('登録') }}</button>
             </div>
             <div>
              <method="POST" action="/upload" enctype="multipart/form-data">



               <input type="file" id="file" name="img_path" class="form-control-file">



            </div>

            <div class="title m-b-md">

            <button type="button" onclick="location.href='{{ route('list') }}' ">戻る</button>

            </div>
         </form>
     </div>
 </div>
</div>
@endsection

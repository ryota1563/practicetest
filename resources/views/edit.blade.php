@extends('layouts.app')

@section('title', '商品管理画面')

@section('content')

         <p>{{$message}}</p>
         <form action="{{ route('update',$product->id) }}" method="post" enctype="multipart/form-data">
             @csrf


             <div class="form-group">
                 <label for="product">商品名</label>
                 <input type="text" class="form-control" id="product" name="product_name" placeholder="商品名" value="{{ $product->product_name }}">
                 @if($errors->has('product'))
                     <p>{{ $errors->first('product') }}</p>
                 @endif
             </div>

             <select name="company_id">
               @foreach($companies as $company)
               <option value="{{ $company->id }}">{{ $company->company_name }}</option>
               @endforeach

             </select>

             <div class="form-group">
                 <label for="price">価格</label>
                 <input type="text" class="form-control" id="price" name="price" placeholder="価格" value="{{ old('price') }}">
                 @if($errors->has('price'))
                     <p>{{ $errors->first('price') }}</p>
                 @endif
             </div>

             <div class="form-group">
                 <label for="stock">在庫数</label>
                 <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数" value="{{ old('stock') }}">
                 @if($errors->has('comment'))
                     <p>{{ $errors->first('stock') }}</p>
                 @endif
             </div>

             <div class="form-group">
             <label for="comment">コメント</label>
             <textarea class="form-control" id="comment" name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
             @if($errors->has('comment'))
                 <p>{{ $errors->first('comment') }}</p>
             @endif

             <div>
              <button type="submit" class="btn btn-default">{{ __('登録') }}</button>
             </div>
             <div>
              <method="POST" action="/upload" enctype="multipart/form-data">

                    {{ csrf_field() }}

               <input type="file" id="file" name="img_path" class="form-control">

               <button type="submit" class="btn btn-primariy btn-lag">アップロード</button>
            </div>

            <div class="title m-b-md">

              <a href = "{{ url('/detail') }}"><button type="submit" class="btn btn-default">戻る</button></a>



  {{-- バリデーション --}}
          @if($errors->has('onamae'))
          <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('onamae') }}</p>
          @endif
         <button class="btn btn-lg btn-primary btn-block" type="submit">更新</button>
</form>

@endsection

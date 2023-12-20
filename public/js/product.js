console.log('検索ボタン押下');
$('.user-search-form .submit').on('click', function () {



let companyName =$('#search_name').val();


        $.ajax({
            type: 'GET',
            url: '/list/' + companyName, //後述するweb.phpのURLと同じ形にする
            data: {
              'search_name': companyName,
            },
            dataType: 'json', //json形式で受け取る

         }).always(function(){
    //通信の成功と失敗に関わらず実行される処理
         }).done(function (data){
           // オブジェクトや値を JSON 文字列に変換
           var data_stringify = JSON.stringify(data);

           // 文字列を JSON として解析し、文字列によって記述されている JavaScript の値やオブジェクトを構築します。
           var data_json = JSON.parse(data_stringify);

      //ajaxが成功したときの処理
         }).fail(function(){
        //通信が失敗した時に実行される処理
      })

//             $('.loading').addClass('display-none'); //通信中のぐるぐるを消す
//             let html = '';
//             $.each(data, function (index, value) { //dataの中身からvalueを取り出す
// 　　　　//ここの記述はリファクタ可能
//                 let id = value.id;
//                 let name = value.name;
//                 let avatar = value.avatar;
//                 let itemsCount = value.items_count;
// 　　　　// １ユーザー情報のビューテンプレートを作成
//                 html = `
//                             <tr class="user-list">
//                                 <td class="col-xs-2"><img src="${avatar}" class="rounded-circle user-avatar"></td> //${}で変数展開
//                                 <td class="col-xs-3">${name}</td>
//                                 <td class="col-xs-2">${itemsCount}</td>
//                                 <td class="col-xs-5"><a class="btn btn-info" href="/user/${id}">詳細</a></td>
//                             </tr>
//                                 `
//             })
//             $('.user-table tbody').append(html); //できあがったテンプレートをビューに追加
// 　　　// 検索結果がなかったときの処理
//             if (data.length === 0) {
//                 $('.user-index-wrapper').after('<p class="text-center mt-5 search-null">ユーザーが見つかりません</p>');
//             }
//
//         }).fail(function () {
// 　　　//ajax通信がエラーのときの処理
//             console.log('どんまい！');
//         })

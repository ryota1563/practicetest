
$(function(){
$("#search_name").on('click', function () {
 console.log('検索ボタン押下');

let companyName = $('#search_name').val();
let jougenName = $('#jougen.price').val();
let kagenName = $('#kagen.price').val();
let jougenStock = $('#jougen.stock').val();
let kagenStock = $('#kagen.stock').val();

        $.ajax({
            type: 'GET',
            url: 'search',
            data: {
              'search_name': companyName,
              'jougen.price':jougenName,
              'kagen.price':kagenName,
              'jougen.stock':jougenStock,
              'kagen.stock':kagenStock,
            },
            dataType: 'html', //json形式で受け取る
         }).done(function (data){
           console.log(data);
           let newTable = $(data).find('#products-table');
           $('#products-table').replaceWith(newTable);
           loadSort();
         }).fail(function(){
        //通信が失敗した時に実行される処理
        console.log('検索失敗')
      })

         })
         })

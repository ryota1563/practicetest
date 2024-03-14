
$(function deleteEvent(){
  $('#sorttable').tablesorter({
  headers: {
      0: {sorter:false},
      1: {sorter:false},
      2: {sorter:true},
  },
  sortList: [[0,1],[2,0]],

})
$("#search_name").on('click', function () {

 console.log('検索ボタン押下');

let companyName = $('#searchInput').val();
let makerName = $('#selectsearch').val();
console.log(makerName);
let jougenName = $('#jougen-price').val();
let kagenName = $('#kagen-price').val();
let jougenStock = $('#jougen-stock').val();
let kagenStock = $('#kagen-stock').val();

deleteEvent()

        $.ajax({
            type: 'GET',
            url: 'search',
            data: {
              'search_name': companyName,
              'selectsearch':makerName,
              'jougen-price':jougenName,
              'kagen-price':kagenName,
              'jougen-stock':jougenStock,
              'kagen-stock':kagenStock,
            },
            dataType: 'html', //json形式で受け取る

         }).done(function (data){
           // console.log(data);
           let newTable = $(data).find('#products-table');
           $('#products-table').replaceWith(newTable);


        }).fail(function(){
              //通信が失敗した時に実行される処理
              console.log('検索失敗')        //デフォルトソート
    })
  })

  $(".btn-dell").on('click', function (e){

    e.preventDefault();
  console.log("成功")

  deleteEvent()
  var clickEle = $(this)
   // 削除ボタンにユーザーIDをカスタムデータとして埋め込んでます。
   var deleteProduct = clickEle.attr('data-product_id');

                $.ajax({
                     type: 'POST',
                      url: 'destroy/' + deleteProduct,
                      dataType: 'json',
                      data: {
                        'id':deleteProduct,
                        '_method': 'DELETE'
//ララベル　ajax　削除

                        },

                        headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                      },
                      dataType:'html',



                    }).done(function(data){
                      clickEle.parents('tr').remove();
//押した行を削除の記述
                    }).fail(function(){
                      console.log('削除失敗')
                    })
  })
  })

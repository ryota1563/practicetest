<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class sale extends Model
{



    protected $table = "sales";

    protected $fillable = ['product_id', //ここに配列で追加、編集するフィールドを入力する
                        // 'フィールド2',
                        // 'フィールド3',
                          ]; //　$fillable属性を追記

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

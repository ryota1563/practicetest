<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Product;



class sale extends Model
{
    

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    protected $fillable = ['product_id', 'quantity'];


}

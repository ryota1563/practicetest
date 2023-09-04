<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    protected $table = "companies";
    public function getList() {

       $companies = DB::table('companies')->get();

       return $companies;
}
public function Product()
   {
       return $this->hasMany('App\Models\Product');
   }
}

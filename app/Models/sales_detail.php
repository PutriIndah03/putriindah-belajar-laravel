<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_detail extends Model
{
    protected $table = "sales_details";
    protected $fillable = [
        "sales_id",
        "product_id",
        "quantity",
        "amount_total",
    ] ;
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function products(){
        return $this->belongsTo(product::class,'product_id','id');
    }
}

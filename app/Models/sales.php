<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    protected $table = 'sales';
    protected $fillable = [
        "code",
        "trx_date",
        "sub_amount",
        "amount_total",
        "discount_amount",
        "total_products",
        "customer_id",
        "description",
    ] ;
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function customer(){
        return $this->belongsTo(Vendor::class,'customer_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    protected $table = 'purchase';
    protected $fillable = [
        "code",
        "trx_date",
        "sub_amount",
        "amount_total",
        "discount_amount",
        "total_products",
        "vendor_id",
        "description",
    ] ;
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class circulation extends Model
{
    protected $table = 'circulations';
    protected $fillable = [
        "trx_date",
        "reff",
        "in",
        "out",
        "product_id",
        "remaining_stock",
    ] ;
    protected $primaryKey = 'id';
    public $timestamps = true;
}

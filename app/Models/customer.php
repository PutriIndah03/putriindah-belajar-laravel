<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'code',
        'name',
        'phone_number',
        'email',
        'address',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function sales(){
        return $this->hasMany(sales::class);
    }
}

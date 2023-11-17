<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $table = 'vendors';
    protected $fillable = [
        'code',
        'name',
        'phone_number',
        'email',
        'address',
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function purchase(){
        return $this->hasMany(purchase::class);
    }
}

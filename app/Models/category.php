<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        "name",
    ] ;
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function products(){
        return $this->hasMany(product::class);
    }
}

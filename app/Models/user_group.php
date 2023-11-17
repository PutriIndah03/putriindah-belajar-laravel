<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_group extends Model
{
    protected $table = 'user_groups';
    protected $fillable = [
        "group_name",
        "description",
    ] ;
    protected $primaryKey = 'id';
    public $timestamps = true;
}

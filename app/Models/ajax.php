<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ajax extends Model
{
    public $table="photos";
    protected $fillable = [
       'name', 'image'
    ];

    use HasFactory;
}

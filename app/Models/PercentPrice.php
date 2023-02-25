<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PercentPrice extends Model
{
    use HasFactory;
    protected $table = "percent_price";
    public $timestamps = false;
}

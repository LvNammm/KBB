<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function createdAt(){
        return $this->belongsTo(Admin::class,"created_by","id");
    }

    public function updatedBy(){
        return $this->belongsTo(Admin::class,"updated_by");
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_categories','id_category','id_product');
    }

    
}

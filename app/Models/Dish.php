<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = "dishes";
    protected $fillable = [ 'menunumber','menu_addition','category_id','name','description','price'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function orderdishes(){
        return $this->hasMany(Order_Dish::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [ 'id','category_id','name','description','price'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

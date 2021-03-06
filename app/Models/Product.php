<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "products";
    protected $fillable = ['name','description','price','photo','type'];

    public function getDescriptionAttribute($value){
        return ucfirst(strtolower($value));
    }


    public function setNameAttribute($value){
        $this->attributes['name'] = mb_strtoupper($value, "UTF-8");
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}

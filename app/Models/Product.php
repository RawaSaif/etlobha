<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','sku','for','description','purchasing_price','selling_price','quantity','image','tags','store_id','status','is_deleted'];
    
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function setImageAttribute($image)
    {
        if (!is_null($image)) {
            if (gettype($image) != 'string') {
                $i = $image->store('images/product', 'public');
                $this->attributes['image'] = $image->hashName();
            } else {
                $this->attributes['image'] = $image;
            }
        }
    }

    public function getImageAttribute($image)
    {
        if (is_null($image)) {
            return   asset('assets/media/man.png');
        }
        return asset('storage/images/product') . '/' . $image;
    }
    public function options()
    {
       return $this->belongsToMany(
        Option::class,
            'options_products',
            'product_id',
            'option_id');
    }
}
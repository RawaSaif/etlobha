<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name','name_en','country_num','status','is_deleted'];
    public function city()
    {
        return $this->hasMany(City::class);
    }
}

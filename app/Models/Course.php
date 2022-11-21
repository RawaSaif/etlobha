<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','duration','tags','user_id','status','is_deleted'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function unit()
    {
        return $this->hasMany(Unit::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        
    ];

    public function mainCategory()  {
        return $this->belongsTo(MainCategory::class,'category_id','id');
    }

    public function Books()  {
        return $this->hasMany(Book::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'category_id',
        

    ];

    public function subcategory()  {
        return $this->belongsTo(SubCategory::class,'category_id');
    }
    public function mainCategory()
{
    return $this->subcategory->mainCategory;
}
public function ratings()
{
    return $this->hasMany(Rating::class);
}
   
   
    
}

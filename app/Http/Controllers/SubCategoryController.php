<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BookController;

class SubCategoryController extends Controller
{

   
    public function index()
    {   $scategory=SubCategory::with('mainCategory')->get();
        return view('category.subindex',compact('scategory'));
    }
    public function create()
    {
        $categories=MainCategory::all();
        return view('category.sub',compact('categories'));
    }
    public function store(Request $request)
    {   
         $request->validate([
            'name'=>['string'],
            'category_id'=>['required','integer','exists:main_categories,id'],
           ]);
           
           
           
           $scategory= new SubCategory();
           $scategory->name=$request->name;
           $scategory->category_id=$request->category_id;   
           $scategory->save();
           return redirect()->route('category.subindex');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\SubCategory;
use App\Models\MainCategory;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\MainCategoryController;

class BookController extends Controller
{
  
    public function index(){
        
        
    {   $book=Book::with('subcategory')->get();
        return view('book.book',compact('book'));
    }
}
    public function create()
    {
        $categories=SubCategory::all();
        $category=MainCategory::all();
        return view('book.create',compact('categories','category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['string'],
            'author'=>['string'],
            'category_id'=>['required','integer','exists:sub_categories,id'],
            
            
           ]);
           
           $book= new Book();
           $book->title=$request->title;
           $book->author=$request->author;
           $book->category_id=$request->category_id;
           $book->save();
           return redirect()->route('category.book');
          
    }
}

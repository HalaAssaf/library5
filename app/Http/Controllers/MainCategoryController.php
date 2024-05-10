<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainCategory;

class MainCategoryController extends Controller
{
  
    public function index()
    {   $mcategory=MainCategory::all();
        return view('category.index',compact('mcategory'));
    }
    public function create()
    {
        return view('category.main');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['string'],
           
            
           ]);
           
           $mcategory= new MainCategory();
           $mcategory->name=$request->name;
           
           
           $mcategory->save();
           return redirect()->route('category.index');
    }
}

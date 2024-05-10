<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('filterBooks','index');
    }
    

    public function index()
    {
        $book = Book::with('subcategory.maincategory')->get();
        
        $combined = [
            'book' => $book,
        ];
    
        return response()->json([
            'status' => 'success',
            'data' => $combined,
        ]);
        abort(404);
    }
    public function add(Request $request)
{
    $user = Auth::user(); // Get the authenticated user
    $book = Book::find($request->book_id); // Find the book by ID

    if (!$book) {
        return response()->json(['error' => 'Book not found'], 404);
    }

    $favorite = new Favorite;
    $favorite->book_id = $book->id;
    $favorite->user_id = $user->id;
    $favorite->book_title = $book->title;
    
    $favorite->save();
    
    return response()->json([$book->title, 'Book added to favorites'], 201);
    //return response()->json(['book_name' => $book->title], 200);

}
public function showFavorite()
{
    $user = Auth::user();
    $favo = Favorite::where('user_id',Auth::user()->id)->get();
    return response()->json([
        'status' => 'success',
        'list' => $favo,
    ]);
    abort(404);
}

    public function filterBooks(Request $request)
    {
        
       
        $mainCategory = $request->input('main_category');
        $subCategory = $request->input('sub_category');
        $query = Book::query();
       
        if ($mainCategory) {
            $query->whereHas('subcategory.maincategory', function ($query) use ($mainCategory) {
                $query->where('name', $mainCategory);
            });
        }

        if ($subCategory) {
            $query->whereHas('subCategory', function ($query) use ($subCategory) {
                $query->where('name', $subCategory);
            });
        }

        $books = $query->get();

        return response()->json($books);
    }

    
        }
 

   


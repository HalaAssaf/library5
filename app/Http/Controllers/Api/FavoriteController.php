<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(Request $request)
{
    $user = Auth::user(); // Get the authenticated user
    $book = Book::find($request->book_id); // Find the book by ID

    if (!$book) {
        return response()->json(['error' => 'Book not found'], 404);
    }

    $favorite = new Favorite;
    $favorite->book_id = $book->id;
    $favorite->book_title = $book->title;
    
    $favorite->save();
    
    return response()->json([$book->title, 'Book added to favorites'], 201);
    //return response()->json(['book_name' => $book->title], 200);

}
public function rateBook(Request $request)
{
    // Ensure the user is authenticated
    $user = Auth::user();

    // Validate the request data
    $validated = $request->validate([
        'book_id' => 'required|integer',
        'rating' => 'required|integer|between:0,5',
    ]);

    // Here you would typically save the rating to your database
    // For simplicity, we'll just return the rating
    return response()->json(['message' => 'Rating saved successfully', 'rating' => $validated['rating']]);
}

}

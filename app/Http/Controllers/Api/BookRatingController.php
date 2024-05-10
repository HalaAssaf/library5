<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;

class BookRatingController extends Controller
{
    public function rate(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'book_id' => 'required|integer',
            'rating' => 'required|integer|between:0,5',
        ]);

        Rating::create([
            'user_id' => $user->id,
            'book_id' => $validated['book_id'],
            'rating' => $validated['rating'],
        ]);

        return response()->json(['message' => 'Rating saved successfully']);
    }

    public function getBookRatings($bookId)
    {    
        $user = Auth::user();
        $book = Book::with('ratings')->find($bookId);
        $ratings = $book->ratings;
    
        return response()->json([
            'status' => 'success',
            'book' => $book,
            'ratings' => $ratings,
        ]);
    
}
}
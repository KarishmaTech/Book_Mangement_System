<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Session; // Import the Book model

class BookController extends Controller
{

   public function dashboard(Request $request)
{
    $query = $request->input('search');

    $books = Book::when($query, function ($queryBuilder) use ($query) {
        return $queryBuilder->where('book_name', 'LIKE', "%{$query}%")
                             ->orWhere('author_name', 'LIKE', "%{$query}%");
    })
    ->latest() 
    ->paginate(5) 
    ->appends(['search' => $query]); 

    
    return view('dashboard', compact('books', 'query'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
}


    public function create()
    {
        return view('create');
    }

 public function store(Request $request)
{
	
    $request->validate([
        'book_name' => 'required|string|max:255',
        'author_name' => 'required|string|max:255',
        'comment' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'image' => 'required', 
    ]);

  
    if ($request->hasFile('image')) {
       
        $imageName = time() . '.' . $request->file('image')->extension();

        
        $request->file('image')->move(public_path('images'), $imageName);
    } else {
       
        return redirect()->back()->with('error', 'Image upload failed.');
    }

   
    Book::create([
        'book_name' => $request->book_name,
        'author_name' => $request->author_name,
        'comment' => $request->comment,
        'rating' => $request->rating,
        'image' => $imageName,
    ]);

   
    return redirect()->route('dashboard')->with('success', 'Book created successfully.');

}

 public function edit($id)
{

    $book = Book::findOrFail($id);
    //dd( $book);
    
    return view('edit', compact('book'));
}

public function update(Request $request, $id)
{
    // Validate the form input
    $request->validate([
        'book_name' => 'required|string|max:255',
        'author_name' => 'required|string|max:255',
        'comment' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'image' => 'nullable', // Image is optional
    ]);

    
    $book = Book::findOrFail($id);
//dd( $book);
    
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageName);
        $book->image = $imageName;
         }

 
    $book->update([
        'book_name' => $request->book_name,
        'author_name' => $request->author_name,
        'comment' => $request->comment,
        'rating' => $request->rating,
    ]);

    return redirect()->route('dashboard')->with('success', 'Book updated successfully.');
}

public function show($id)
{
    $book = Book::findOrFail($id);
    return view('show', compact('book'));
}


    public function destroy($id)
{
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect()->route('dashboard')->with('success', 'Dashboard deleted successfully.');
}


}



           
        
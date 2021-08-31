<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //all books
    public function index()
    {
        $books = Book::all()->toArray();
        return array_reverse($books);
    }
    //add books
    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required'
        ]);
        $book = new Book([
            'name' => $request->input('name'),
            'author' => $request->input('author')
        ]);
        $book->save();

        return response()->json('The book successfully added');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    //edit book
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    //update book
    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());

        return response()->json('The book successfully updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
    //delete book
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json('The book successfully deleted');
    }
}

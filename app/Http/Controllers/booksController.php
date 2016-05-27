<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Section;
use App\Book;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $book_title        =  $request->book_title;
        $book_edition      =  $request->book_edition;
        $book_description  =  $request->book_description;
        $section_id        =  $request->section_id;
                
        $new_book = new Book;
        $new_book->book_title       = $book_title;
        $new_book->book_edition     = $book_edition;
        $new_book->book_description = $book_description;
        $new_book->section_id = $section_id;

        $new_book->save();
        
        return redirect('library/'.$section_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book_title        =  $request->book_title;
        $book_edition      =  $request->book_edition;
        $book_description  =  $request->book_description;
        $section_id        =  $request->section_id;
        $book = Book::find($id);
        $book->book_title = $book_title;
        $book->book_edition = $book_edition;
        $book->book_description = $book_description;

        $book->save();

       return redirect('library/'.$section_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
         $section_id = $request->section_id;

        Book::destroy($id);
        return redirect('library/'.$section_id);
    }
}

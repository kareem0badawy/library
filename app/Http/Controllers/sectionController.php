<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Html;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       // $sections = DB::table('sections')->get();
        $sections = Section::all(); 
        return view('libraryViewsContainer.library',compact('sections'));
        //return view('libraryViewsContainer.library')->withDate($date)->withTime($time);
        
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
        $section_name = $request->input('section_name');
        $file = $request->file('image');
        $destinationPath = 'images';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath,$filename);

        $new_section = new Section;
        $new_section->section_name = $section_name;
        $new_section->image_name = $filename;
        $new_section->save();

        session()->push('m', 'success');
        session()->push('m', 'Section created successfuly! ');

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sections = Section::find($id);

        $all_books = $sections->books;
        $array_of_authors = [];
        $i = 0 ;

        foreach ($all_books as $book) {
            $array_of_authors = array_add($array_of_authors,$i,
                $book->authors()->select("authors.first_name", "authors.id")->get());

            $i++;
        }

        return view('libraryViewsContainer.books', compact('sections','all_books','array_of_authors')); 

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
    public function update($id,Request $request)
    {
        $section_name = $request->input('section_name');
    
        $section = Section::find($id);
        $section->section_name = $section_name;
        $section->save();

        session()->push('m', 'success');
        session()->push('m', 'Section updtaded successfuly! ');
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Section::destroy($id);

     session()->push('m', 'danger');
     session()->push('m', 'Section Deleted successfuly! ');
     return redirect('admin'); 
    }

    public function admin()
    {
        $sections = Section::withTrashed()->get();

        return view('libraryViewsContainer.admin', compact('sections')); 
    }

    public function restore($id)
    {
        $sections = Section::onlyTrashed()->find($id);
        $sections->restore();
        session()->push('m', 'info');
        session()->push('m', 'Section restored successfuly! ');
        return redirect('admin');
    }

    public function deleteForever($id)
    {
        $sections = Section::onlyTrashed()->find($id);
        $sections->forceDelete();
        session()->push('m', 'danger');
        session()->push('m', 'Section deleteForever ! ');
        return redirect('admin');
    }
}

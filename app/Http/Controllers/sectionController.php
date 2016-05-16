<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Section;
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
    public function showCreate()
    {
        $sections = Section::get(); 
        
        return view('libraryViewsContainer.admin',['sections'=>$sections]);
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
     return redirect('admin'); 
    }
}

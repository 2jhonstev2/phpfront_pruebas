<?php

namespace App\Http\Controllers;

use App\Models\Books;

use App\Models\Authors;
use App\Models\Categories;
use App\Models\Editorials;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::with(['authors','categories','editorials'])->get();

        $authors    = Authors::all();
        $categories = Categories::all();
        $editorials = Editorials::all();

        return view('crud', compact('books','authors','categories','editorials'));
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
        Books::create($request->all());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Books::find($id);
        $item->title = $request->input('title');
        $item->author_id = $request->input('author');
        $item->category_id = $request->input('category');
        $item->editorial_id = $request->input('editorial');
        $item->year_publication = $request->input('year_publication');
        $item->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
        return redirect('/');
    }

    public function getBookId($id){
        $book = Books::where('id',$id)->first();
        return response()->json(json_encode($book), 200);
    }
}

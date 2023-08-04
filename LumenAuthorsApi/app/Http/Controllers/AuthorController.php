<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function index()
    {
        $authors = Author::all();
        return $authors;
    }


    public function store(Request $request)
    {
        //
    }


    public function show($author)
    {
        //
    }


    public function update(Request $request, $author)
    {
        //
    }


    public function destroy($author)
    {
        //
    }
}

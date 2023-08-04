<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{

    use ApiResponses;
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
        return $this->successResponse($authors);
    }


    public function store(Request $request)
    {
        $rules = [
            'name'    => 'required|maz:255',
            'gender'  => 'required|maz:255|in:male,female',
            'country' => 'required|maz:255',
            'status'  => 'nullable|maz:255',
        ];


        Validator::make($request->all(), $rules);

        $author = Author::create($request->all());

        return $this->successResponse($author, Response::HTTP_CREATED);
    }


    public function show($author)
    {
        $author = Author::find($author);
        return $this->successResponse($author);
    }


    public function update(Request $request, $author)
    {
        $rules = [
            'name'    => 'maz:255',
            'gender'  => 'maz:255|in:male,female',
            'country' => 'maz:255',
            'status'  => 'maz:255',
        ];

        Validator::make($request->all(), $rules);

        $author = Author::find($author);
        $author->fill($request->all());

        if ($author->isClean())
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        $author->save();

        return $this->successResponse($author);
    }


    public function destroy($author)
    {
        $author = Author::find($author);
        $author->delete();

        return $this->successResponse($author);
    }
}

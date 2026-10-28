<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    // Read all data
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response() -> json([
                'success' => true,
                'message' => 'Resource data not found!',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $authors
        ], 200);
    }

    // Create data author
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bio' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
        ];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('authors', 'public');
        }

        $author = Author::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Author added successfully!',
            'data' => $author
        ], 201);
    }
}
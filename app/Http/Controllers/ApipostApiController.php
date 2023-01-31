<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class ApipostApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'show all',
            Post::all()
        ]);
    }

    public function store(Request $request)
    {
        Post::create([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'massage' => 'has create successfully',
        ]);
    }

    public function show($id)
    {
         $data = Post::find($id);

         return response()->json([
                'success' => true,
                "data" => [
                    'id' => $id,
                    'name' => $data->name,
                ]
         ]);
    }

    public function update(Request $request, $id)
    {
        $data = Post::find($id);
        $data->name = $request->name1;

        $data->save();

        // return response()->json([
        //         'success' => true,
        //         'message' => 'update post successful'
        // ]);
    }
    
    public function delete($id)
    {
        $data = Post::find($id);

        $data->delete();

         return response()->json([
                // 'success' => true,
                'message' => 'update post successful'
        ]);
    }
}

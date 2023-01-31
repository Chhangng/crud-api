<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     public function index()
     {
        return response()->json([
            Comment::all()
        ],200);
     }

     public function store(Request $request)
     {
          $postName = Post::where('name',$request->post_id)->first();
          Comment::create([
            'post_id'     => $postName->id,
            'name'  => $request->name,
            're_comment' => $request->re_comment

          ],200);

          return response()->json([
              'success' => true,
              'message' => 'comment has create'
          ]);
     }

     public function show($id)
     {
        $comment = Comment::find($id);
        
        return response()->json([
            'success' => true,
            'data' => [
                'id'         => $id,
                'post_id'    => $comment->post_id,
                're_comment' => $comment-> re_comment,
            ]
            ],200);
     }

     public function update(Request $request , $id)
     {
           
          $comment = Comment::find($id);
          
          $comment->clas_id   = $request->class_id;
          $comment->name = $request->name;
          $comment->re_comment = $request->re_comment;

          $comment->save();

          return response()->json([
                'message' => 'you  updated sucess' 
          ]);
        
     }

     public function delete($id)
     {
        $comment = Comment::find($id);

        $comment->delete();

        return response()->json([
            'message' => 'you delete successfull' 
        ]);
     }
}

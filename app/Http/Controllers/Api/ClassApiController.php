<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            Classes::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Classes::create([
            'name'  =>$request->name,
            'class_dep' =>  $request->class_dep
        ]);

        return response()->json([
            "success"  =>   true,    
            "message"   =>  'has create  class' 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Classes::find($id);
        return response()->json([
                "success" => true,
                "data"    => [
                     'id'     =>$id,
                     'name'    =>$data->name ,
                     'class_dep'    => $data->class_dep
                     
                ]
        ],200);

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
        // dd(11);
        $data = Classes::find($id);

        $data->name = $request->name;
        $data->class_dep = $request->class_dep;

        $dd = $data->save();

        if($dd)
        {
            return ["return" => "data has been update success...."];
        }else{
            return ["return" => "invalid to update......"];
        }
        
        // $data->save();

        // return response()->json([
        //     "success"  =>   true,    
        //     "message"   =>  'has update class' 
        // ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $class = Classes::find($id);

        $result = $class->delete();

        if($result)
        {
            return ['result'  => 'delete has success'];
        }else{
            return ['result'  => 'invalid to delete'];
        }

        // return response()->json([
        //     'success' => true,
        //     'message' => 'SocialPosts Deleted successfully.'
        // ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classes;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            // dd(Student::all());
        return response()->json([
            // 'success'   => true,
            Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // *******************************************
    //  not use 
     // *******************************************
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //*** create  
    public function store(Request $request)
    {
        $className = Classes::where('name', $request->class_id)->first();
        Student::create([
            'class_id'      => $className->id,
            'first_name'    =>  $request->first_name,
            'last_name'     =>  $request->last_name,
            'phone'         =>  $request->phone,
            'email'         =>  $request->email,
            'gender'        =>  $request->gender
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "create has students"
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  can call for read
    public function show($id)
    {
        $student = Student::find($id);

        return response()->json([
            'success'   => true,
            "data"  => [
                'id'    => $id,
                'phone' => $student->phone,
                

            ]
        ]);

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // *******************************************
    // not use
     // *******************************************

    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function update(Request $request, $id)
    // {
    //     $student = Student::find($id);

    //     $student->first_name = $request->input('first_name');
    //     $student->last_name = $request->input('last_name');
    //     $student->phone = $request->input('phone');
    //     $student->email = $request->input('email');
    //     $student->gender = $request->input('gender');
     
    //     // $student->save();

    //     // return "Sucess updatind user #". $student->id;

    //     return response()->json([
    //         'success'   => true,
    //         'message'   => "create has update"
    //     ],200);
    // }

    public function update(Request $request, $id){

        $data = Student::find($id);
       
     
        // $studets_id = Classes::where('name', $request->class_id);

        // $studets_id=Classes::all()->pluck('name');
        // $studets_id = Classes::get(['name'])->pluck('name');
        
        // $data->class_id   = $request->$studets_id;

        // dd($request->all());
        
        $data->class_id   = $request->class_id;
        $data->first_name = $request->first_name;
        $data->last_name  = $request->last_name;
        $data->phone   = $request->phone;
        $data->email = $request->email;
        $data->gender = $request->gender;
    

         $data->save();

        if($data)
        {
            return ["return" => "data has been update success...."];
        }else{
            return ["return" => "invalid to update......"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $student = Student::find($id->input('id'));

        // return "Employee record successfully deleted #" . $id->input('id');

        // $id->delete();
        // return response(null, 204);

        $data = Student::find($id);
        
        $resulf = $data->delete();

        if($resulf)
        {
            return ["result" => " Delete success"];
        }else{
            return ["result" => "Invalid to delete"];
        }

    }
}

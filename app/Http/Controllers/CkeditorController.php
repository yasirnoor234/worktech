<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ckeditor;

class CkeditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ckeditor.index');
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
        //
        try{
            $input = $request->all();
            Ckeditor::updateOrCreate([
                'id' => $request->id,
            ], [
                'title' => $input['title'],
                'editor' => $input['editor'],
            ]);
            if($request->id){
                $msg = 'update successfully';
            }else{
                $msg = 'added successfully';
            }

            $arr = array("status" => 200, "msg" => $msg);            
        
        } catch (\Illuminate\Dataase\QueryException $ex){
            $msg = $ex->getMessage();
            if(isset($ex->errorInfo[2])) :
                $msg = $ex->errorInfo[2];
            endif;

            $arr = array("status" => 400, "msg" => $msg , "result" => array());            
            
        }

        return \Response::json($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
    public function upload(Request $request) { 
        if($request->hasFile('upload')) {
                    //get filename with extension
                   $originName = $request->file('upload')->getClientOriginalName();
                    //get filename without extension
                   $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    //get file extension
                   $extension = $request->file('upload')->getClientOriginalExtension();
                   //filename to store
                   $fileName = $fileName.'_'.time().'.'.$extension;
               
                    //Upload File
                   $request->file('upload')->move(public_path('images'), $fileName);
          
                   $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                   $url = asset('images/'.$fileName); 
                   $msg = 'Image uploaded successfully'; 
                   $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                      
                    // Render HTML output 
                   @header('Content-type: text/html; charset=utf-8'); 
                   echo $response;
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
        //
    }
}

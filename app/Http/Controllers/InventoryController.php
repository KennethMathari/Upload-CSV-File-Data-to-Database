<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(){
        return view('index');
    }

    public function upload(Request $request){
        //Get CSV file
        $upload=$request->file('upload-csv');
        $filePath=$upload->getRealPath();
        //Open File
        $file=fopen($filePath,'r');
        //Read File
        $header=fgetcsv($file);

        //Loop through Rows
        while($rows=fgetcsv($file)){
            if($rows[0]==''){
                continue;
            }
            //Trim Data
            foreach($rows as $key=>&$value){
                $value=preg_replace('/\D/','',$value);
            }
            //Combine Header & Row values
            $data=array_combine($header, $rows);
        };
    }
}

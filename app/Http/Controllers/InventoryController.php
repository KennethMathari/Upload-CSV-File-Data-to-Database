<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Http\Requests;


class InventoryController extends Controller
{
    public function index(){
        $inventories=Inventory::orderBy('StockCode','desc')->paginate(10);
        return view('index')->with('inventories',$inventories);
    }

    public function upload(Request $request){

        $request->validate([
            'file'=>'required|mimes:csv,txt'
        ]);
        //Increase File Upload Memory Limit
        ini_set('memory_limit','1024M');


        //Read Entire File
        $file=file($request->file->getRealPath());

        //Remove first record
        $data=array_slice($file,1);

        //Split Every 5000 records
        $parts=(array_chunk($data, 5000));

        //Loop through each record bunch
        foreach ($parts as $index=>$part) {
            $fileName= resource_path('pendingfiles/'.date('y-m-d-H-i-s').$index.'.csv');
            //Write File Content
            file_put_contents($fileName,$part);
        };

        //Process smaller CSV files
        (new Inventory())->importToDB();
        
        session()->flash('status','Just a minute..');

        return redirect('/');
    }
}

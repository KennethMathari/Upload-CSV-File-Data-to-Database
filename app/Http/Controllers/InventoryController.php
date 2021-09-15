<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Http\Requests;



class InventoryController extends Controller
{
    public function index(){
        return view('index');
    }

    public function upload(Request $request){
        // //Get CSV file
        // $upload=$request->file('upload-csv');
        // $filePath=$upload->getRealPath();
        // //Open File
        // $file=fopen($filePath,'r');
        // //Read File
        // $header=fgetcsv($file);

        // $escapedHeader=[];
        // //validate
        // foreach ($header as $key => $value) {
        //     $lheader=strtolower($value);
        //     $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
        //     array_push($escapedHeader, $escapedItem);
        // }

        // //Loop through Rows
        // while($rows=fgetcsv($file)){
        //     if($rows[0]==''){
        //         continue;
        //     }
        //     //Trim Data
        //     foreach($rows as $key=>&$value){
        //         $value=preg_replace('/\D/','',$value);
        //     }
        //     //Combine Header & Row values
        //     $data=array_combine($escapedHeader, $rows);

        //     //Update Table
        //     $InvoiceNo=$data['invoiceno'];
        //     $StockCode=$data['stockcode'];
        //     $Description=$data['description'];
        //     $Quantity=$data['quantity'];
        //     $InvoiceDate=$data['invoicedate'];
        //     $UnitPrice=$data['unitprice'];
        //     $CustomerID=$data['customerid'];
        //     $Country=$data['country'];

        //     $inventory=Inventory::firstOrNew(['stockcode'=>$StockCode]);
        //     $inventory->InvoiceNo=$InvoiceNo;
        //     $inventory->Description=$Description;
        //     $inventory->Quantity=$Quantity;
        //     $inventory->InvoiceDate=$InvoiceDate;
        //     $inventory->UnitPrice=$UnitPrice;
        //     $inventory->CustomerID=$CustomerID;
        //     $inventory->Country=$Country;
        //     $inventory->save();
        // }

        $request->validate([
            'file'=>'required|mimes:csv,txt'
        ]);

        //Read Entire File
        $file=file($request->file->getRealPath());

        //Remove first record
        $data=array_slice($file,1);

        //Split Every 5000 records
        $parts=(array_chunk($data, 5000));
    }
}

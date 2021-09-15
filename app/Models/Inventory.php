<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /**
     * The table associated with the Inventory model.
     *
     * @var string
     */
    protected $table='inventory';
    protected $guarded=[];
    use HasFactory;

    public function importToDB(){
        //Get CSV File Path
        $file=resource_path('pendingfiles/*.csv');
        //Get CSV PendingFiles from resource path
        $g=glob($file);
        /**Loop through each pending files.
        * Process 1 file at a time.
        */
        foreach (array_slice($g,0,1) as $file) {
            //Get data from CSV file
            $data=array_map('str_getcsv', file($file));
            //Loop through data records
            foreach ($data as $row) {
                self::updateOrCreate([
                    //checks if invoiceno. exists
                    'InvoiceNo'=>$row[0]
                ],[
                    'StockCode'=>$row[1],
                    'Description'=>$row[2],
                    'Quantity'=>$row[3],
                    'InvoiceDate'=>$row[4],
                    'UnitPrice'=>$row[5],
                    'Customer'=>$row[6],
                    'Country'=>$row[7]
                ]);
            }
            //delete file
            unlink($file);
        }
    }
}

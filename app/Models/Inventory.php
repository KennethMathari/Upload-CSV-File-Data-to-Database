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
    protected $fillable = ['invoiceno','stockcode','description','quantity','invoicedate','unitprice','customerid','country'];
    use HasFactory;

    public function importToDB(){
        //Get CSV File Path
        $file=resource_path('pendingfiles/*.csv');
        //Get CSV PendingFiles from resource path
        $g=glob($file);
        /**Loop through each pending files.
        *Process 1 file at a time.
        */
        foreach (array_slice($g,0,1) as $file) {
            dump($file);
        }
    }
}

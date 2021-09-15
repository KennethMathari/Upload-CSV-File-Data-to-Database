<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\ProcessCSVUpload;


class Inventory extends Model
{
    /**
     * The table associated with the Inventory model.
     *
     * @var string
     */
    protected $table='inventory';
    protected $guarded=[];
    protected $primaryKey = 'StockCode';

    use HasFactory;

    public function importToDB(){
        //Get CSV File Path
        $file=resource_path('pendingfiles/*.csv');
        //Get CSV PendingFiles from resource path
        $files=glob($file);
        
        //Set Max Execution Time
        ini_set('max_execution_time','1800');
        
        //Loop through each pending files.
        foreach ($files as $file) {
            ProcessCSVUpload::dispatch($file);
        }
    }
}

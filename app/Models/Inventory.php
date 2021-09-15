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
        $g=glob($file);
        /**Loop through each pending files.
        * Process 1 file at a time.
        */
        //Set Max Execution Time
        ini_set('max_execution_time','1800');
        foreach (array_slice($g,0,1) as $file) {
            ProcessCSVUpload::dispatch($file);
        }
    }
}

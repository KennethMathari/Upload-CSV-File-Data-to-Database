<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Inventory;


class ProcessCSVUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $file)
    {
        $this->file=$file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('upload-csv')->allow(10)->every(60)->then(function (){
        //Get data from CSV file
        $data=array_map('str_getcsv', file($this->file));
        //Loop through data records
        foreach ($data as $row) {
            Inventory::updateOrCreate([
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
        unlink($this->file);

        },function (){
            return $this->release(10);
        });

        
    }
}

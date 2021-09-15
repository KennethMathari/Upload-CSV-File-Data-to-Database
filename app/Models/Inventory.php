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
    use HasFactory;
}

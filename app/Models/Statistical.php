<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'date','quantity'
    ];
    protected $primaryKey='id';
    protected $table='statistical';

}

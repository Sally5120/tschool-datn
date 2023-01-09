<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'slider_name','slider_image','slider_desc','slug_slider','kichhoat'
    ];
    protected $primaryKey='id';
    protected $table='sliders';
}

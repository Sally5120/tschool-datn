<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{



    use HasFactory;

     protected $dates=[
         'created_at',
         'updated_at'
    ];

    public $timestamps=false;
    protected $fillable=[
        'tieude','slug_tintuc','tomtat','noidung','hinhanh','kichhoat','views'
    ];
    protected $primaryKey='id';
    protected $table='news';
}

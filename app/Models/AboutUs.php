<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'tieude','slug_thongtin','tomtat','thongtin','hinhanh','kichhoat','sodienthoai','url','diachi','email'
    ];
    protected $primaryKey='id';
    protected $table='about_us';
}

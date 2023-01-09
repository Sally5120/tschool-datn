<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=[
        'hoten','email','sodienthoai','khoahocquantam','trangthai','date_contact'
    ];
    protected $primaryKey='id';
    protected $table='contacts';
}

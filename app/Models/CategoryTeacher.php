<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTeacher extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'tengiaovien','slug_giaovien','tomtat','thongtin','hinhanh','kichhoat'
    ];
    protected $primaryKey='id';
    protected $table='category_teachers';

    public function khoahoc(){
        return $this->hasMany('App\Models\PostClass');
    }
    // public function monhoc(){
    //     return $this->belongsTo('App\Models\CategorySubject','id_monhoc','id');
    // }
}

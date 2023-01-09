<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostClass extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'id_monhoc','id_giaovien','tieude','slug_post','tomtat','noidung','hinhanh','lichkhaigiang','views','kichhoat','Soluonghocvien'
    ];
    protected $primaryKey='id';
    protected $table='post_classes';

    public function monhoc(){
        return $this->belongsTo('App\Models\CategorySubject','id_monhoc','id');
    }
    public function giaovien(){
        return $this->belongsTo('App\Models\CategoryTeacher','id_giaovien','id');
    }
}

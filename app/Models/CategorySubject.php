<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySubject extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'tenmonhoc','slug_monhoc','mota','kichhoat'
    ];
    protected $primaryKey='id';
    protected $table='category_subjects';

    public function khoahoc(){
        return $this->hasMany('App\Models\PostClass');
    }
    // public function giaovien(){
    //     return $this->hasMany('App\Models\CategoryTeacher');
    // }

}

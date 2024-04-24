<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "sach"; //kết nối tới bảng nào
    protected $primaryKey = "id"; //thuộc tính khóa chính 
    public $timestamps = false; 
}

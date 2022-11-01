<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use HasFactory;
    protected $table = "donors";
    protected $fillable = ['name','address','user_id'];


    function bloodGroup(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}


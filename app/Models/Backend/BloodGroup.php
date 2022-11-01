<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodGroup extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'blood_groups';

    protected $fillable = ['bg_name','created_by','updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }
    function bloodPouch(){
        return $this->hasMany(BloodPouch::class,'bg_id','id');
    }
    function bName(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

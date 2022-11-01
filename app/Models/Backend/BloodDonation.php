<?php

namespace App\Models\Backend;

use App\Models\User;
use App\Models\Backend\BloodBank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodDonation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'blood_donations';

    protected $fillable = ['donated_date','amount','b_id','user_id','status','created_by','updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }
    function bankName(){
        return $this->belongsTo(BloodBank::class,'b_id','id');
    }
    function donorName(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    function bloodDonation(){
        return $this->hasMany(BloodPouch::class,'bd_id','id');
    }
}

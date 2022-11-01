<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodBank extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "blood_banks";
    protected $fillable = ['bank_name', 'bt_id', 'l_id', 'created_by', 'updated_by'];

    function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    function bankType(){
        return $this->belongsTo(BankType::class,'bt_id','id');
    }

    function bankLocation(){
        return $this->belongsTo(Location::class,'l_id','id');
    }

    function bloodBank(){
        return $this->hasMany(BloodDonation::class ,'b_id','id');
    }
 }

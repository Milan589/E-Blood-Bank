<?php

namespace App\Models\Backend;

use App\Models\User;
use App\Models\Backend\BloodGroup;
use App\Models\Backend\BloodDonation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodPouch extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'bd_id';
    protected $table = 'blood_pouches';

    protected $fillable = ['status','bd_id','bg_id'	,'created_by','updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }
    function bankType(){
        return $this->belongsTo(BankType::class,'bt_id','id');
    }
    function bloodGroup(){
        return $this->belongsTo(BloodGroup::class, 'bg_id','id');
    }
    function bloodDonor(){
        return $this->belongsTo(BloodDonation::class,'bd_id','id');
    }

}

<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBloodPouchDetail extends Model
{
    use HasFactory;
    protected $table = 'order_blood_pouch_details';
    protected $fillable =['bo_id','bp_id','quantity','price'];
}

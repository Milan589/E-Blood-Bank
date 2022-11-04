<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'blood_orders';
    protected $fillable = ['user_id', 'b_id', 'shipping_address', 'phone', 'email', 'order_code', 'order_status', 'order_date', 'total', 'payment_mode'];

    public function bloodBank()
    {
        return $this->belongsTo(BloodBank::class, 'b_id', 'id');
    }
    public function order(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}

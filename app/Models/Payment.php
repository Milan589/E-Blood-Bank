<?php

namespace App\Models;

use App\Models\Backend\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable =['order_id','payment_id','payer_email','payer_id','amount','currency','payment_status'];

    public function payment(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}

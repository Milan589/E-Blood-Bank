<?php

namespace App\Models;

use App\Models\Backend\BloodDonation;
use App\Models\Backend\BloodGroup;
use App\Models\Backend\Role;
use Faker\Core\Blood;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'phone',
        'email',
        'password',
        'created_by',
        'updated_by',
        'bg_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class, 'bg_id', 'id');
    }

    function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
    
    function donor(){
        return $this->hasOne(Donor::class,'user_id','id');
    }
}

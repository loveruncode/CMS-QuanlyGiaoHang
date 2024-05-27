<?php

namespace App\Models;

use App\Enums\Customer\CustomerType;
use App\Observers\Customer\CustomerOserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";
    protected static function boot()
    {
        parent::boot();

        static::observe(CustomerOserver::class);
    }

    protected $fillable = [
        'fullname',
        'phone',
        'type',
        'admin_id',
        'province_code',
        'district_code',
        'ward_code',
        'address',
        'fulladdress'
    ];

    protected $casts = [
        'type' => CustomerType::class
    ];


    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_code', 'code');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
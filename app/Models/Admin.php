<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;

    public function vendorPersonal() {
        return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }
    public function vendorBusiness() {
        return $this->belongsTo('App\Models\VendorBussinessDetail', 'vendor_id');
    }
    public function vendorBank() {
        return $this->belongsTo('App\Models\VendorBankDetail', 'vendor_id');
    }
}

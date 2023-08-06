<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VendorBussinessDetail;
class Vendor extends Model
{
    use HasFactory;
    
    public function vendorBusinessDetails()
    {
        return $this->belongsTo('App\Models\VendorBussinessDetail', 'id', 'vendor_id');
    }

    public static function vendorShop($vendor_id)  {
        $getVendorShop = VendorBussinessDetail::where('vendor_id', $vendor_id)->select('shop_name')->
        first()->toArray();
        return $getVendorShop;
    }

    public static function getVendorCommission($vendor_id)
    {
        $getVendorCommission = Vendor::select('commissions')->where('id', $vendor_id)->first()->toArray();
        return $getVendorCommission['commissions'];
    }

}

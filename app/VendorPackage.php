<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorPackage extends Model
{
    protected $fillable = ['vendor_id', 'name', 'price', 'features'];
    
   
}

<?php

namespace App\Models;

use App\Modules\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function thana(){
        return $this->hasMany(Thana::class);
    }
    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function customer(){
        return $this->hasMany(Customer::class);
    }
}

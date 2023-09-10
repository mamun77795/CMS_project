<?php

namespace App\Modules\Customer\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'street',
        'thana',
        'district',
        'post_code',
        'company',
        'notes',
];

public function district(){
    return $this->belongsTo(District::class);
}

}

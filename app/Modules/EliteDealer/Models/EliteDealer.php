<?php

namespace App\Modules\EliteDealer\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EliteDealer extends Model
{
    // use HasFactory;
    protected $table = 'dealer_users';
    protected $guarded = ['id'];

    protected $dates =['created_at'];
}

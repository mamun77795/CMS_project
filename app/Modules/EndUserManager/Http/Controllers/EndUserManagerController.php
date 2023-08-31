<?php

namespace App\Modules\EndUserManager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EndUserManagerController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("EndUserManager::welcome");
    }
}

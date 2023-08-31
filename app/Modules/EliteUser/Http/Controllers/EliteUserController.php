<?php

namespace App\Modules\EliteUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EliteUserController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("EliteUser::welcome");
    }
}

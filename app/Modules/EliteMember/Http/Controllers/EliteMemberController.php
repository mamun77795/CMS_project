<?php

namespace App\Modules\EliteMember\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EliteMemberController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("EliteMember::welcome");
    }
}

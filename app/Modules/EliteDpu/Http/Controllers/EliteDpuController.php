<?php

namespace App\Modules\EliteDpu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EliteDpuController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("EliteDpu::welcome");
    }
}

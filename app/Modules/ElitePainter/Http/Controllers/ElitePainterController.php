<?php

namespace App\Modules\ElitePainter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElitePainterController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("ElitePainter::welcome");
    }
}

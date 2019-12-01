<?php

namespace Shuvo\Errorlog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Shuvo\Errorlog\models\Errorlog;

class ErrorlogController extends Controller
{

    public function sendError(Request $request)
    {
        //DB Insert
        Errorlog::create($request->all());
    }

    public function errorLog()
    {
        $errorlist = Errorlog::get()->toArray();

        return view("errorlog::errorlogList", compact("errorlist"));
    }
}

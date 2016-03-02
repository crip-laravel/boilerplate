<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * action(HomeController@getIndex)
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('home.index');
    }
}

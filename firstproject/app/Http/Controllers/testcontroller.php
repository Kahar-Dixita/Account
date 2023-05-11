<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test;
class testcontroller extends Controller
{
    //
    function getData()
    {
        return test::all();
    }
}

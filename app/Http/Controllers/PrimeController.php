<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeController extends Controller
{
    function Index()
    {
      $data = [];

      return view("prime");
    }
}

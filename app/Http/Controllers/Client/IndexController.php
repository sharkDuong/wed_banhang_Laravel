<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
   public function home(){
       return view('client.page.home.index');
   }
}

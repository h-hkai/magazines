<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VoicesController extends Controller
{
    // Show a list of all voice in album 
    public function index(): View
    {
      $voices = DB::table('voices')->where('album', '=', '20240921')->orderBy('num', 'asc')->get();

      return view('voices', compact('voices'));
    }
}

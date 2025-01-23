<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MagazinesController extends Controller
{
    // Show a list of all of magazines
    public function index(): View
    {
      $query = DB::table('persistence')->where('id', 1)->first();
      $count = $query->access_counts;

      $magazines = DB::table('magazines')->whereNotNull('pure_download_links')->orderBy('update_time', 'desc')->paginate(15);

      return view('magazines', [
        'magazines' => $magazines, 
        'count' => $count]);
    }

    public function history(): View
    {
      return view('history');
    }

    public function count()
    {
      $query = DB::table('persistence')->where('id', 1)->first();
      $count = $query->access_counts;     

      DB::table('persistence')->where('id', 1)->update(['access_counts' => $count+1]);
    }
}

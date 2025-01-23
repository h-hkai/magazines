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
      $study_code = null;
      $passwd = $query->study_code;
      $count = $query->access_counts;

      $magazines = DB::table('magazines')->whereNotNull('pure_download_links')->orderBy('update_time', 'desc')->paginate(15);

      return view('magazines', [
        'magazines' => $magazines, 
        'study_code' => $study_code, 
        'count' => $count, 
        'passwd' => $passwd]);
    }

    public function get(Request $request): View
    {
      $study_code = $request->get('study_code');
      $query = DB::table('persistence')->where('id', 1)->first();
      $count = $query->access_counts;
      $passwd = $query->study_code;
      if ($study_code == $passwd) {
        DB::table('persistence')->where('id', 1)->update(['access_counts' => $count+1]);
      }

      $magazines = DB::table('magazines')->whereNotNull('pure_download_links')->orderBy('update_time', 'desc')->paginate(15);

      return view('magazines', [
        'magazines' => $magazines, 
        'study_code' => $study_code, 
        'count' => $count, 
        'passwd' => $passwd]);
    }

    public function history(): View
    {
      return view('history');
    }
}

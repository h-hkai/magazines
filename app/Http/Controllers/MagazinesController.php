<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MagazinesController extends Controller
{
    // Show a list of all of magazines
    public function index(): View
    {
      $query = DB::table('persistence')->where('id', 1)->first();
      $count = $query->access_counts;

      $magazines = DB::table('magazines')->where('download_links_nums', '>', 0)->orderBy('update_time', 'desc')->paginate(16);

      return view('magazines', [
        'magazines' => $magazines, 
        'count' => $count]);
    }

    public function history(): View
    {
      return view('history');
    }

    public function count($id)
    {
      $query = DB::table('persistence')->where('id', 1)->first();
      $count = $query->access_counts;     

      DB::table('persistence')->where('id', 1)->update(['access_counts' => $count+1]);

      // 更新课程学习次数
      $query = DB::table('magazines')->where('id', $id)->first();
      $count = $query->count;     
      DB::table('magazines')->where('id', $id)->update(['count' => $count+1]);

      // 更新用户学习次数
      $user = Auth::user();
      $query = DB::table('users')->where('id', $user->id)->first();
      $count = $query->count;     
      DB::table('users')->where('id', $user->id)->update(['count' => $count+1]);
      $daily_count = $query->count;
      DB::table('users')->where('id', $user->id)->update(['daily_count' => $daily_count+1]);
    }

    public function show($id): View
    {
      $magazine = DB::table('magazines')->where('id', $id)->first();
      return view('show', ['magazine' => $magazine]);
    }
}

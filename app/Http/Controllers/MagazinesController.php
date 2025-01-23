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
      // $magazines = DB::select("select * from magazines where pure_download_links is not null and tags like '%大陆%'");
      $query = DB::table('persistence')->where('id', 1)->first();
      $study_code = null;
      $passwd = $query->study_code;
      $count = $query->access_counts;

      // $magazines = DB::select("select * from magazines where pure_download_links != 'None' order by update_time desc limit 50");
      $magazines = DB::table('magazines')->whereNotNull('pure_download_links')->orderBy('update_time', 'desc')->paginate(15);
      // $magazines = DB::table('magazines')->where('tags', 'LIKE', '%经济学人%')->whereNotNull('pure_download_links')->orderBy('update_time', 'desc')->limit(1)->union($magazines)->get()->paginate(15);
      // $magazines = DB::select("select * from magazines where (pure_download_links is not null or tags like '%海外剧集%') order by update_time desc limit 30")->paginate(16);

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
      // $magazines = DB::table('magazines')->where('tags', 'LIKE', '%经济学人%')->whereNotNull('pure_download_links')->orderBy('update_time', 'desc')->limit(1)->union($magazines)->get();
      // $magazines = DB::select("select * from magazines where (pure_download_links is not null or tags like '%海外剧集%') order by update_time desc limit 30")->paginate(16);


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

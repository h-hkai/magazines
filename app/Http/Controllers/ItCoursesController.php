<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ItCoursesController extends Controller
{
    // Show a list of all of courses 
    public function index(): View
    {
      $query = DB::table('persistence')->where('id', 1)->first();
      $study_code = null;
      $passwd = $query->study_code;
      $count = $query->access_counts;

      $courses = DB::table('itcourses')->orderBy('update_time', 'desc')->paginate(15);

      return view('itcourses', [
        'courses' => $courses, 
        'study_code' => $study_code, 
        'count' => $count, 
        'passwd' => $passwd]);
    }

    public function get(Request $request): View
    {
      $study_code = $request->get('study_code');
      $query = DB::table('persistence')->where('id', 1)->first();
      $count = $query->access_counts;
      // $passwd = $query->study_code;
      $passwd = "1234";
      if ($study_code == $passwd) {
        DB::table('persistence')->where('id', 1)->update(['access_counts' => $count+1]);
      }

      $courses = DB::table('itcourses')->orderBy('update_time', 'desc')->paginate(15);

      return view('itcourses', [
        'courses' => $courses, 
        'study_code' => $study_code, 
        'count' => $count, 
        'passwd' => $passwd]);
    }
}

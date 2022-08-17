<?php

namespace App\Http\Controllers\Frontpages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\SystemSetting;
use App\Models\Location;

class ShortlistController extends Controller
{
    public function index(){

      $indigene = Studentapplicant::where('admission_status', 'MAYBE')->where('department_id', '=', '1')->orderByDesc('date_interview')->orderByDesc('score')->get();
      $checkisYES=  Studentapplicant::where('admission_status', 'YES')->where('department_id', '=', '1')->orderByDesc('score')->get();
      //$checkisYES = null;
          return view('applicationguide')->with('students', $indigene)->with('checkisYES', $checkisYES);
    }
}

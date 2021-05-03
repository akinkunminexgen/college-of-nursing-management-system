<?php

namespace App\Http\Controllers\Frontpages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Location;

class ShortlistController extends Controller
{
    public function index(){
      $indigene = Studentapplicant::where('admission_status', 'YES')->where('department_id', '=', '1')->orderByDesc('score')->get();
      
      //$mid = Studentapplicant::where('admission_status', 'YES')->where('department_id', '=', '3')->orderBy('surname')->get();
      //dd($indigene);
      $Nonindigene = Studentapplicant::where('score', '>',59)->where('department_id', 1)->where('state_of_origin','!=', 31)->orderByDesc('score')->get();
     /* $indigene = Studentapplicant::where('score', '>',51)->where('department_id', 1)->where('state_of_origin','=', 31)->orderByDesc('score')->take(56)->get();*/
      $indigene1 = Studentapplicant::where('score', '>',51)->where('department_id', 1)->where('state_of_origin','=', 31)->orderByDesc('score')->skip(56)->take(100)->get();
      //dd($student);
      return view('applicationguide')->with('students', $indigene)->with('studN', $indigene1)->with('mids', $Nonindigene);
    }
}

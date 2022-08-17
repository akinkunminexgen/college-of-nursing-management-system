<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Payment;
use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $fmt = "23:59:59";
        $secdat = date("Y-m-d");
        $usersperday="";
        for ($i=6; $i > 0 ; $i--) {
          $date=date('Y-m-d', strtotime($secdat. ' - '.$i.' days'));
          $checkusersperday = Studentapplicant::where('created_at', '>=', $date)->where('created_at', '<', $date." ".$fmt)->count();
          $usersperday .= $checkusersperday.",";
        }
          return view('admin.index', [
            'section' => 'dashboard',
            'users' => Studentapplicant::all(),
            'students' => Student::all(),
            'activeStudents' => $students =  Student::join('users', 'users.id', '=', 'students.user_id')->where('is_active', 'ACTIVE')->get(),
            'admins' => Admin::all(),
            'userstoday' => Studentapplicant::where('created_at', '>=', date("Y-m-d"))->where('created_at', '<', date("Y-m-d")." ".$fmt),
            'pay_made' => Payment::orderByDesc('created_at')->limit(7)->get(),
            'pay_app' => Paymentapplicant::orderByDesc('created_at')->limit(7)->get(),
            'posts' => Post::all(),
            'usersperday' => $usersperday
        ]);
    }
}

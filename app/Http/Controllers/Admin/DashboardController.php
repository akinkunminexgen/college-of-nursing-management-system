<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'section' => 'dashboard',
            'users' => Studentapplicant::all(),
            'students' => Student::all(),
            'admins' => Admin::all(),
            'userstoday' => Studentapplicant::where('created_at', date("Y-m-d")),
            'posts' => Post::all()
        ]);
    }
}

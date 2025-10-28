<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Cardapplicant;
use App\Alert;
use App\Models\SystemSetting;
use Session;
use PDF;

class DashboardController extends Controller
{
    public function index()
    {
        try {
             
           
              $student = Studentapplicant::where('cardapplicant_id', session()->get('auth'))->first();
        
              if($student == null)
              {
                //assign an object inorder to decieve the login
                $student = '{"score":null, "admission_status" :null, "first_name":null, "pic_url":null}';
                $student = json_decode($student);
                //dd($student);
              return View('admission.dashboard',['section'=>'dashboard', 'student' => $student, 'amount' => null, 'charges' => null]);
              }
              //create a session for student id
              session()->put('studapp_id', $student->id);

              //get acceptance fee and subaccounts
              $settings = SystemSetting::whereIn('name', [
                                                  'BMidwifery_sub_account',
                                                  'GNursing_sub_account',
                                                  'acceptance_payment_fee',
                                                  ])->get()->keyBy('name');
              //set bank charges to 300 naira
              $charges = 300;
              //dd($student->Paymentapplicant->last()->reference);
              return View('admission.dashboard',['section'=>'dashboard', 
                                                  'student' => $student, 
                                                  'amount' => $settings['acceptance_payment_fee']->value ?? null,
                                                  'nursingSubaccount' => $settings['GNursing_sub_account']->value ?? null,
                                                  'midwiferySubaccount' => $settings['BMidwifery_sub_account']->value ?? null,
                                                  'charges' => $charges,
                                                ]);
        } catch (\Exception $e) {
            session()->flush();
             $note = 'Please contact the admin, an error has occured';
            // $notification = Alert::alertMe($note, 'info');
             return redirect()->back()->with('success', $note);
           }
    }

    public function acceptancePDF()
    {
      if (Session::has('studapp_id')) {

      $student = Studentapplicant::find(session()->get('studapp_id'));

      $payment = $student->paymentapplicant;

      $dob = date('d-m-Y', strtotime($student->dob));

      $pdf = PDF::loadView('admission/pdfAcceptance', compact('student', 'dob', 'payment'));

      return $pdf->download('Acceptance.pdf');

    }
  }
  
  public function scorePDF()
    {
      if (Session::has('studapp_id')) {

      $student = Studentapplicant::find(session()->get('studapp_id'));
      //dd($student->cardapplicant->reg_no);

      $pdf = PDF::loadView('admission/pdfScore', compact('student'));

      return $pdf->download('Scoreload.pdf');

    }
  }

    public function logout()
    {
      session()->flush();
      return redirect()->route('admission.login');
    }

}

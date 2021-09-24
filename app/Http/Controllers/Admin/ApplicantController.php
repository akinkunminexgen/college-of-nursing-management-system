<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Cardapplicant;
use App\Models\Invoice;
use App\Models\Location;
use App\Models\State;
use App\Alert;
use PDF;
use DB;


class ApplicantController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('checkAdminPermissions:super,intermediate');
    }
    public function index()
    {
       $applicants= Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')->select('studentapplicants.id', 'surname', 'first_name', 'email', 'phone', 'sponsor_name', 'home_address', 'state_of_origin', 'admission_status', 'reg_no')->paginate(10);
      //dd($applicants[0]->cardapplicant);
        return view('admin.applicants.index', ['section' =>'applicants','sub_section' => 'all', 'applicant' => $applicants]);
    }

    public function deleteall(Request $request)
    {
      $this->validate($request, [
        'password' => 'required',
        ]);
        if ($request->password != 'oysconme1949new') {
          $notification = Alert::alertMe('Sorry! you are not allowed any permission on this file', 'info');
          return redirect()->route('applicants.index')->with($notification);
        }else {
            try {
                    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                    Studentapplicant::Truncate();
                    Cardapplicant::Truncate();
                    Paymentapplicant::Truncate();
                    Invoice::Truncate();
                    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
               } catch (\Exception $e) {
                 $note = $e->getMessage();
                 $notification = Alert::alertMe($note, 'success');
                 return redirect()->back()->with($notification);
               }

          $notification = Alert::alertMe('Admission DataTable Deleted successfully!!!', 'success');
            return redirect()->route('applicants.index')->with($notification);
      }
    }



    public function exportcsv(Request $request)
    {
          $student =Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
          ->select('reg_no', 'surname', 'first_name', 'middle_name', 'password', 'pic_url', 'gender', 'marital_status',
          'lga', 'state_of_origin','phone','email','score')->orderBy('reg_no')->where('department_id','2')->get();
          // file name for download
          $fileName = "applicants".date('Ymd').".xls";

          // headers for download
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$fileName\"");

          $flag = false;
            foreach($student as $row) {
                if(!$flag){
                    // display column names as first row
                    echo implode("\t", array_keys($row->getOriginal())) . "\n";
                    $flag = true;
                }
                echo implode("\t", array_values($row->getOriginal())) . "\n";
            }
            exit;
            $notification = Alert::alertMe('Exporting!!!', 'Success');
            return redirect()->route('applicants.index')->with($notification);


    }


    public function editapplicant(Studentapplicant $studentapplicant)
    {
      //dd($studentapplicant);
      return view('admin.applicants.editapplicant', ['section' =>'applicants','sub_section' => 'all', 'student' => $studentapplicant, 'states' => State::all()]);
    }

    public function updateapplicant(Request $request, Studentapplicant $studentapplicant)
    {
      $this->validate($request, [
          'surname' => 'string|required',
          'first_name' => 'string|required',
          'middle_name' => 'string',
          'gender' => 'required',
          'phone' => 'required|digits:11',
          'dob' => 'required|date|before:16 years ago',
          'email' => 'required|email',
          'home_address' => 'string|required',
          'lga' => 'required',
          'state_of_origin' => 'required',
          'religion' => 'required',
          'sponsor_name' => 'string|required',
          'sponsor_phone' => 'required|digits:11',
          'sponsor_add' => 'required|string',
          'exam_no' => 'required',
          'mathematics' => 'required',
          'english' => 'required',
          'biology' => 'required',
          'physics' => 'required',
          'chemistry' => 'required'
      ], [
          'dob.before' => 'The date of birth should be 16 years upward',
          'state.required' => 'select your present state',
          'state_of_origin.required' => 'Select a State of origin',
          'lga.required' => 'Select a local government'
      ]);

      $studentapplicant->update([
        'surname' => $request->surname,
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'gender' => $request->gender,
        'email' => $request->email,
        'phone' => $request->phone,
        'dob' => $request->dob,
        'home_address' => $request->home_address,
        'lga' => $request->lga,
        'state_of_origin' => $request->state_of_origin,
        'religion' => $request->religion,
          'sponsor_name' => $request->sponsor_name,
          'sponsor_phone' => $request->sponsor_phone,
          'sponsor_add' => $request->sponsor_add,
          'exam_no' => $request->exam_no,
          'mathematics' => $request->mathematics,
          'english' => $request->english,
          'biology' => $request->biology,
          'physics' => $request->physics,
          'chemistry' => $request->chemistry,
      ]);
        $notification = Alert::alertMe("Student's information updated", 'success');
        return redirect()->route('applicants.index')->with($notification);
    }




    public function edit(Studentapplicant $studentapplicant)
    {
      return view('admin.applicants.addscore', ['section' =>'applicants','sub_section' => 'all', 'studentapplicant' => $studentapplicant]);
    }

      public function update(Request $request, Studentapplicant $studentapplicant)
      {
        $this->validate($request, [
          'ad_sta' => 'required',
          'score' => 'required',
          ]);

          $studentapplicant->update([
            'score' => $request->score,
            'admission_status' => $request->ad_sta
          ]);
          $notification = Alert::alertMe('Result Added!!', 'success');
          return redirect()->route('applicants.index')->with($notification);
      }


      public function search(Request $request)
      {
        $this->validate($request, [
          'user' => 'required'
          ]);
            $email= $request->user;
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $variable = 'studentapplicants.email';
            } else {
              $variable = 'cardapplicants.reg_no';
            }

          //$student = Cardapplicant::with('studentapplicant')->where('reg_no', $request->user)->first();
          $student = Studentapplicant::select('studentapplicants.id', 'reg_no', 'admission_status', 'email', 'phone', 'home_address', 'first_name', 'sponsor_phone', 'surname', 'state_of_origin', 'pic_url')
          ->join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')
          ->where($variable, $request->user)->first();
          //dd($student);
          if ($student == null) {
            return $student;
          //  return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'approved', 'applicant' => $student, 'reg_no' => $student]);
          }
          else {
            return $student;
          }
        //  return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'approved', 'applicant' => $student, 'reg_no' => $student->reg_no]);
      }


      public function searchunapproved(Request $request)
      {
        // aim is to check for the Invoice table inoder to make payment incase of any webhook delay
        $this->validate($request, [
          'user' => 'required'
          ]);


            $student = Invoice::where('email', $request->user)->first();
            //dd($student);

          if ($student == null) {
            return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'unapproved', 'applicant' => $student, 'reg_no' => $student]);
          }
          return view('admin.applicants.search',['section' =>'applicants','sub_section' => 'all', 'tag' => 'unapproved', 'applicant' => $student, 'reg_no' => NULL]);
      }

      public function manualpay(Request $request)
      {
        $this->validate($request, [
          'email' => 'required',
          'reference' => 'required',
          'id' => 'required',
          'amount' => 'required|numeric'
          ]);

          $invoice = Invoice::find($request->id);
          $student = Studentapplicant::where('email', $request->email)->first();
        //  dd($student);
          if ($student == NULL) {

            //generate a rand pin
                  $pin = (string)rand(1000000000, 9999999999);

                 $card = Cardapplicant::create([
                     'invoice_id' =>  $invoice->id,
                     'password' => bcrypt($pin),
                     'pin' => $pin,
                   ]);
                   //create registration number
                   $id = $card->id;
                   $dep = 'CNM/21B/';
                   if ($id < 10) {
                       $txt = sprintf("%s000%u",$dep,$id);
                   }
                   if ($id < 100 and $id > 9) {
                     $txt = sprintf("%s00%u",$dep,$id);
                   }
                   if ($id < 1000 and $id > 99) {
                       $txt = sprintf("%s0%u",$dep,$id);
                   }
                   if ($id > 1000) {
                       $txt = sprintf("%s%u",$dep,$id);
                   }
                   $card->update([
                     'reg_no' => $txt,
                   ]);

                  $arr = explode(",", $invoice->metadata);
                  $lastname = $arr[0];
                  $firstname = $arr[1];


                  $student = $card->studentapplicant()->create([
                     'first_name' => $firstname,
                     'surname' => $lastname,
                     'phone' =>  $invoice->phone,
                     'email' => $invoice->email,
                     'dob' => $invoice->dob
                  ]);

                    $payment = $student->Paymentapplicant()->create([
                      'reference' => $request->reference,
                      'payment_modes_id' => 1, // to show it is paid through paystack
                      'status' => 'PAID',
                      'amount' => $request->amount - 300, //getting exact amount from paystack
                    ]);

            $notification = Alert::alertMe('Payment Made!!!', 'success');
              return redirect()->back()->with($notification);
          }else {

            $notification = Alert::alertMe('Student Already Exist!!!', 'success');
              return redirect()->back()->with($notification);
          }




      }


      public function delete(Studentapplicant $studentapplicant)
      {
        $studentapplicant->delete();
        $notification = Alert::alertMe('Deleted successfully!!!', 'success');
          return redirect()->route('applicants.index')->with($notification);

      }


      public function tellerindex(Studentapplicant $studentapplicant)
      {
        return view('admin.applicants.confirmteller', ['section' =>'applicants','sub_section' => 'all', 'studentapplicant' => $studentapplicant]);
      }


      public function addteller(Request $request, Studentapplicant $studentapplicant)
      {
        $this->validate($request, [
          'reference' => 'required',
          'amount' => 'required'
          ]);
          $mode = 2;
          $studentapplicant->paymentapplicant()->create([
            'reference' => $request->reference,
            'amount' => $request->amount,
            'status' => 'PAID',
            'payment_modes_id' => $mode
          ]);
          $notification = Alert::alertMe('Applicant Payment confirmed', 'success');
          return redirect()->back()->with($notification);
      }

// create ExaminationList in PDF format
      public function pdfApplicants()
      { ini_set('memory_limit', '2048M');
        $applicants= Studentapplicant::join('cardapplicants', 'cardapplicants.id', '=', 'studentapplicants.cardapplicant_id')->where('department_id', '=', '3')->orderBy('reg_no')->orderBy('date_exam')->skip(0)->take(359)->get();
    //dd($applicants[1145]);
        $pdf = PDF::loadView('admin/applicants/downloadpdf', compact('applicants'));

        return $pdf->download('ExaminationList.pdf');
      }

      // show page to add result
      public function showresultpage()
      {
        return view('admin.applicants.addresult', ['section' =>'applicants','sub_section' => 'add']);
      }


      public function importresult(Request $request)
      {
          ini_set('memory_limit', '2048M');
        $this->validate($request,[
                'file_csv'          => 'required',
            ]
          );

          $msg = "";
          $i = 0;
          $sql = true;
          $file = $request->file('file_csv')->getRealPath();
          $handle = fopen($file, "r");
          $filename = $request->file_csv->getClientOriginalExtension();
          if ($file == NULL || $filename !== 'csv') {
            $notification = Alert::alertMe('Please select a CSV file to import', 'warning');
              return redirect()->route('applicants.addresult')->with($notification);
          }else {
            while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
              {
                $reg_no=  filter_var($filesop[0], FILTER_SANITIZE_STRING);
                //$score =  filter_var($filesop[1], FILTER_SANITIZE_STRING);
                $status = filter_var($filesop[1], FILTER_SANITIZE_STRING);

                // get the id of the card
                $result = Cardapplicant::where('reg_no', $reg_no)->first();
                if ($result == null) {
                    $msg.= $reg_no." does not exist in the database at row ".$i."\n";
                }
                else{
                  Studentapplicant::where('cardapplicant_id', $result->id)
                  ->update(['admission_status' => $status]);

                $sql = true;
                }
                $i++;
              }

            if ($sql) {
              if($msg != ""){
                $message = "imported successfully!!! but '.$msg.'";
              return redirect()->route('applicants.addresult')->with('success', $message);
              }
              $notification = Alert::alertMe('Imported successfully!!!', 'success');
                return redirect()->route('applicants.addresult')->with($notification);

            } else {
              $notification = Alert::alertMe('Sorry! There is some problem in the import file', 'warning');
              return redirect()->route('applicants.addresult')->with($notification);

            }
            }

      }

}

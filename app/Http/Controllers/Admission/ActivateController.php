<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cardapplicant;
use App\Models\Invoice;
use App\Models\SystemSetting;
use Paystack;
use PDF;

class ActivateController extends Controller
{
  public function index()
  {
    if (!session()->has('appAuth')) {
      return redirect()->route('invoice.activate')->with('error', 'please login');
    }

    $invoice = Invoice::find(session()->get('appAuth'));
    $card= $invoice->cardapplicant;
    $settings = SystemSetting::where('name', 'admission_close_date')->first();

  //  $card = Cardapplicant::where('reg_no', $invoice->reg_no)->first();
    if ($card == null) {
      $system = SystemSetting::where('name','admission_payment_fee')->orWhere('name','admission_sub_account')->get();
      //dd($system[0]->value);
      return view('admission.Appformfee')->with('user', $invoice)
                                        ->with('setting', $system[0]->value)
                                        ->with('subaccount', $system[1]->value)
                                        ->with('settings', $settings)
                                        ->with('card', null);
    }

    return view('admission.Appformfee')->with('user', $invoice)
                                      ->with('setting', null)
                                      ->with('settings', $settings)
                                      ->with('card', $card);
    //dd($card->studentapplicant->paymentapplicant()->first());


  }

  public function redirectToGateway(Request $request)
  {
    $request->validate([
        'amount' => 'required|string|max:255',
    ]);

    try {
      return Paystack::getAuthorizationUrl()->redirectNow();
    } catch (\Exception $e) {
      $note = $e->getMessage();
      return redirect()->back()->with('warning', $note);
    }
  }

  public function downloadPDF(Cardapplicant $cardapplicant)
  {

    $pdf = PDF::loadView('admission/pdfAppformfee', compact('cardapplicant'));

    return $pdf->download('Registration.pdf');
  }

  public function logout()
  {
    session()->forget('appAuth');
    return redirect()->route('invoice.activate');

  }
}

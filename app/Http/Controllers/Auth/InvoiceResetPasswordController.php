<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class InvoiceResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/admission/appformlogin';

    public function broker()
    {
        return Password::broker('invoices');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset-invoice')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}

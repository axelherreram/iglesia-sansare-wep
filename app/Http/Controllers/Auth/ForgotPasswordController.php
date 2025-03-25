<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('login')->with('status', 'Correo de restablecimiento enviado. Revisa tu correo.');
        } else {
            return back()->withErrors(['email' => 'No se pudo enviar el correo. Inténtalo nuevamente.']);
        }
    }

    public function showLinkRequestForm()
    {
        return view('forgot-password');
    }
}

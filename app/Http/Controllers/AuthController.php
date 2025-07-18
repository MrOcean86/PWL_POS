<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login()
    {
        // Jika sudah login, maka redirect ke halaman home
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $redirect = '/';
                if ($user->hasRole('ADM')) {
                    $redirect = '/admin/dashboard';
                } elseif ($user->hasRole('MNG')) {
                    $redirect = '/manager/dashboard';
                } elseif ($user->hasRole('STF')) {
                    $redirect = '/staf/dashboard';
                } elseif ($user->hasRole('KSR')) {
                    $redirect = '/kasir/dashboard';
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url($redirect)
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
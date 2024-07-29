<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use Validator;
use Guzzle\Http\Message\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

use JsonException;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string',
    ],[
        'email.required' => 'Veuillez entrer votre email',
        'email.email' => 'Veuillez entrer un email valide',
        'email.exists' => 'Cet email n\'existe pas',
        'password.string' => 'Veuillez entrer votre mot de passe',
        'password.required' => 'Veuillez entrer votre mot de passe',
    ]);

    // Attempt to authenticate the user
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        
        if ($user->role == "user") {
            return redirect()->route('home');
        } 
            else {
                Auth::login($user);
            
                return redirect()->route('dashboard');
        }
    }

    
    return redirect("login")->withErrors('Vérifiez que votre email et mot de passe sont corrects.');
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
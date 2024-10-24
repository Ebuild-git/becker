<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\register;
use App\Models\Category;
use App\Mail\register as MailRegister;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

 

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
        
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8','string', 'confirmed', Rules\Password::defaults()],
         
        ],[
            'email.required' => 'Veuillez entrer votre email',
            'email.email' => 'Veuillez entrer un email valide',
            'email.exists' => 'Cet email n\'existe pas',
            'email.unique' => 'Cet email existe déjà, il faut entrer un autre',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères.',
            'password.string' => 'Veuillez entrer votre mot de passe',
            'password.required' => 'Veuillez entrer votre mot de passe',
         
        ] 
    );
       

        $user = new User();

        $user->nom = $request->nom;

        $user->prenom  = $request->prenom;


        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        $user->save();
  // Authenticate the user immediately
  Auth::login($user);

  // Send the registration email, but handle errors gracefully
  try {
      Mail::to($user->email)->send(new MailRegister($user));
  } catch (\Exception $e) {
      \Log::error('Failed to send registration email: ' . $e->getMessage());
      // Optionally: return a message to the user about the failure
  }



        //send mail to user
        //Mail::to($user->email)->send(new register($user));
      //  Mail::to($user->email)->send(new  MailRegister($user));


     //   event(new Registered($user));


       // Auth::login($user);
        return redirect()->back()->with("success", "Votre compte est crée ");
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use App\Http\Requests\commandes\CommandesRequest;
use Illuminate\Http\Request;
use App\Models\{commandes, produits, contenu_commande, config, notifications, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
//use Illuminate\Support\Facade\Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\OrderMail;
use App\Mail\FirstOrder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Notifications\NewOrder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Mail\Mailable;
//use App\Services\PayUService\Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Traits\TailleProduit;

use App\Http\Traits\ListGouvernorats ;


class CommandeController extends Controller
{

  public $cart;
  use ListGouvernorats;
  use TailleProduit;


 /*  public function __construct()
  {
    $this->middleware('auth');
  } */



  public function commander()
  {
    $configs = config::firstOrFail();
    $paniers_session = session('cart');
    $paniers = [];
    $taille = [];
    $total = 0;
    if(empty($paniers_session)){
      request()->session()->flash('error','La panier est vide !');
      return back();
  }

    foreach ($paniers_session as $session) {
      $produit = produits::find($session['id_produit']);
      if ($produit) {
        $paniers[] = [
          'nom' => $produit->nom,
          'id_produit' => $produit->id,
          'photo' => $produit->photo,
          'quantite' => $session['quantite'],
          'taille' => $produit->taille,
          'prix' => $produit->prix,
          'total' => $session['quantite'] * $produit->prix,
        ];
        $total += $session['quantite'] * $produit->prix;
      
      }
    }
   
   $gouvernorats = $this->getListGouvernorat();
   $tailles = $this->getListTailleProduit();


    return view('front.commandes.checkout', compact('configs', 'paniers', 'total','gouvernorats','tailles'));
  }




  public function confirmOrder(Request $request)
  {
    $request->validate([

      'nom' => ['nullable', 'string', 'max:255'],
      'prenom' => ['nullable', 'string', 'max:255'],
      'email' => 'required',
        'message' => 'nullable',
      'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
     
        'phone' => 'required',
  
    ]); 


    $connecte = Auth::user();
    $configs = config::firstOrFail();


  //  $input->photo = $this->photo->store('devis', 'public');
  $photoPath = null;
  if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
      $photoPath = $request->file('photo')->store('devis', 'public');
  }
 
if($connecte){


  $order = new commandes([

    'user_id' => auth()->user()->id,
     'nom' => $request->input('nom'),
     'prenom' => $request->input('prenom'),
     'email' => $request->input('email'),
     'adresse' => $request->input('adresse'),
     'phone' => $request->input('phone'),
     'pays' => $request->input('pays'),
     'note' => $request->input('note'),
     'message' => $request->input('message'),
    //'photo' => $request->input('photo'),
    'photo' => $photoPath,
//'photo' => $request->photo->store('devis', 'public') ??  null,
     'frais' => $configs->frais ?? 0,
    'tax' => $configs->tax ?? 0,
     'gouvernorat' => $request->input('gouvernorat'),

   ]);[
     'email.required' => 'Veuillez entrer votre email',
     'nom.required' => 'Veuillez entrer votre nom',
     'phone.required' => 'Veuillez entrer votre numéro de téléphone',
     'adresse.required' => 'Veuillez entrer votre addresse',

   ];
} else{

  $order = new commandes([

 
     'nom' => $request->input('nom'),
     'prenom' => $request->input('prenom'),
     'email' => $request->input('email'),
     'adresse' => $request->input('adresse'),
     'phone' => $request->input('phone'),
     'pays' => $request->input('pays'),
     'note' => $request->input('note'),
     'message' => $request->input('message'),
    'photo' => $request->input('photo'),
    

     'frais' => $configs->frais ?? 0,
     'tax' => $configs->tax ?? 0,
     'gouvernorat' => $request->input('gouvernorat'),

   ]);[
     'email.required' => 'Veuillez entrer votre email',
     'nom.required' => 'Veuillez entrer votre nom',
     'phone.required' => 'Veuillez entrer votre numéro de téléphone',
     'adresse.required' => 'Veuillez entrer votre addresse',

   ];
}


    $order->save();

   $user = new User([
     
    'nom' => $request->input('nom'),
    'prenom' => $request->input('prenom'),
    'email' => $request->input('email'),
    'password' => Hash::make($request->input('phone')),
   'adresse' => $request->input('adresse'),
    'phone' => $request->input('phone'),
  //  'gouvernorat' => $request->input('gouvernorat'),
 
  ]);



  $existingUsersWithEmail = User::where('email', $request['email'])->exists();

  if (!$existingUsersWithEmail) {
   
    Mail::to($user->email)->send(new FirstOrder($user));
   //$this->sendOrderConfirmationMail($order);
 
    $user->save();
}
 
    $paniers_session = Session::get('cart') ?? [];
    $total = 0;

    foreach ($paniers_session as $session) {
      $produit = produits::find($session['id_produit']);
      $taille = $session['taille'] ?? ''; 
  
      if ($produit) {

        $items=   contenu_commande::create([
          'id_commande' => $order->id,
          'id_produit' => $produit->id,
          'prix_unitaire' => $produit->prix,
          'quantite' => $session['quantite'],
          'taille' => $taille, 

      
        
          
        ]);
      


        $produit->diminuer_stock($session['quantite']);
        
    
      }
    }

   
      $this->sendOrderConfirmationMail($order);
     
    //effacer le panier
  // session()->forget('cart');

    //generate notification
    $notification = new notifications();
   // $notification->url = "admin/commande/" . $order->id;
   //$notification->url = route('details_commande', ['id' => $order->id]);
    $notification->titre = "Nouvelle commande.";
   $notification->message = "Commande passée par " . $order->nom;
    $notification->type = "commande";
    $notification->save();
   

    return redirect()->route('thank-you');
  }

 



  public function sendOrderConfirmationMail($order)
  {
   
     // Mail::to($order->email)->send(new OrderMail($order));

     try {
      Mail::to($order->email)->send(new OrderMail($order));
  } catch (Exception $e) {
  
      \Log::error('Failed to send order confirmation email: ' . $e->getMessage());

   
      return response()->json(['error' => 'Unable to send order confirmation email.'], 500);
  }
   
  }

  

  public function index(Request $request)
  {

    return view('front.commandes.thankyou');
  }
}

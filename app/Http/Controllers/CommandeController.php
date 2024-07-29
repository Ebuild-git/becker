<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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
use App\Services\PayUService\Exception;
use Illuminate\Validation\ValidationException;

use App\Http\Traits\ListGouvernorats ;


class CommandeController extends Controller
{

  public $cart;
  use ListGouvernorats;


 /*  public function __construct()
  {
    $this->middleware('auth');
  } */



  public function commander()
  {
    $configs = config::firstOrFail();
    $paniers_session = session('cart');
    $paniers = [];
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
          'prix' => $produit->prix,
          'total' => $session['quantite'] * $produit->prix,
        ];
        $total += $session['quantite'] * $produit->prix;
       //dd($total);
      }
    }
   
   $gouvernorats = $this->getListGouvernorat();

    return view('front.commandes.checkout', compact('configs', 'paniers', 'total','gouvernorats'));
  }


  public function devis($id)
  {
    $configs = config::firstOrFail();
    $produit =produits:: findOrFail($id);
   
   $gouvernorats = $this->getListGouvernorat();
//dd($produit);
    return view('front.commandes.devis', compact('configs','produit','gouvernorats'));

  }

  
  public function confirmer(Request $request)
  {
    $request->validate([

      'nom' => ['nullable','string','max:255'],
      'prenom' => ['nullable','string','max:255'],
      'email' => 'required',
        'message' => 'nullable',
      'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
     
        'phone' => 'required',
     'frais' => 'nullable',
     'quantite'=>'nullable',
    ///'id_produit' => '|exists:produits,id',
    //'product_id' => 'required|exists:produits,id',

    ]); 
  //  $product = produits::findOrFail($request->id);
   // dd($product);

    $connecte = Auth::user();
    $configs = config::firstOrFail();
    $photoPath = null;
    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $photoPath = $request->file('photo')->store('devis', 'public');
    }
   // dd($connecte);
if($connecte){


  $devis = new commandes([

    'user_id' => auth()->user()->id,
     'nom' => $request->input('nom'),
     'prenom' => $request->input('prenom'),
     'email' => $request->input('email'),
     'adresse' => $request->input('adresse'),
     'phone' => $request->input('phone'),
     'pays' => $request->input('pays'),
     'note' => $request->input('note'),
     'quantite' => $request->input('quantite'),
     'message' => $request->input('message'),
   
    'photo' => $photoPath,
  
    'id_produit' => $request->input('product_id'),
     'frais' => $configs->frais ?? 0,
    'tax' => $configs->tax ?? 0,
     'gouvernorat' => $request->input('gouvernorat'),
    'id_produit' => $request->input('id_produit'),


   ]);[
     'email.required' => 'Veuillez entrer votre email',
     'nom.required' => 'Veuillez entrer votre nom',
     'phone.required' => 'Veuillez entrer votre numéro de téléphone',
     'adresse.required' => 'Veuillez entrer votre addresse',

   ];
} else{

  $devis = new commandes([

  ///  'user_id' => auth()->user()->id,
     'nom' => $request->input('nom'),
     'prenom' => $request->input('prenom'),
     'email' => $request->input('email'),
     'adresse' => $request->input('adresse'),
     'phone' => $request->input('phone'),
     'pays' => $request->input('pays'),
     'note' => $request->input('note'),
     'quantite' => $request->input('quantite'),
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
//  dd($devis);
    $devis->save();

   $user = new User([
     
    'nom' => $request->input('nom'),
    'prenom' => $request->input('prenom'),
    'email' => $request->input('email'),
    'password' => Hash::make($request->input('phone')),
   'adresse' => $request->input('adresse'),
    'phone' => $request->input('phone'),
  ]);



  $existingUsersWithEmail = User::where('email', $request['email'])->exists();

  if (!$existingUsersWithEmail) {
   
    Mail::to($user->email)->send(new FirstOrder($user));
   //$this->sendOrderConfirmationMail($order);
 
    $user->save();
}

/* $product = produits::findOrFail($request->product_id);
dd($product); */

        $items=   contenu_commande::create([
          'id_commande' => $devis->id,
         'id_produit' =>  $request->input('id_produit'),
         // 'prix_unitaire' => $produit->prix,
        // 'quantite' => $devis['quantite'],
        'quantite' =>$request->input('quantite'),
        ]);

 
       
        
    
      
 

    //envoyer les emails
   // Mail::to($devis->email)->send(new OrderMail($devis));
     
    //effacer le panier
  // session()->forget('cart');

    //generate notification
     $notification = new notifications();
   /*  $notification->url = "admin/commande/" . $devis->id; */
 //  $notification->url = route('details_commande', ['id' => $order->id]);
  // $notification ->url = "url('{{ route('details_commande', ['id' => $devis->id]) }}')";
    $notification->titre = "Un nouveau devis.";
   $notification->message = "Devis passé par " . $devis->nom;
    $notification->type = "Commande";
    $notification->save(); 
   

    return redirect()->route('thank-you');
 
   
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
    // 'frais' => 'required',

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

  ///  'user_id' => auth()->user()->id,
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
//  dd($order);

    $order->save();

   $user = new User([
     
    'nom' => $request->input('nom'),
    'prenom' => $request->input('prenom'),
    'email' => $request->input('email'),
    'password' => Hash::make($request->input('phone')),
   'adresse' => $request->input('adresse'),
    'phone' => $request->input('phone'),
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
      if ($produit) {

        $items=   contenu_commande::create([
          'id_commande' => $order->id,
          'id_produit' => $produit->id,
          'prix_unitaire' => $produit->prix,
          'quantite' => $session['quantite'],
        ]);


        $produit->diminuer_stock($session['quantite']);
        
    
      }
    }

    //envoyer les emails
      $this->sendOrderConfirmationMail($order);
     
    //effacer le panier
   session()->forget('cart');

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
   
      Mail::to($order->email)->send(new OrderMail($order));
   
  }

  

  public function index(Request $request)
  {

    return view('front.commandes.thankyou');
  }
}

<?php

namespace App\Livewire\Front;

use App\Models\produits;
use Livewire\Component;
use App\Http\Traits\TailleProduit;

class Panier extends Component
{
    public $total =0;
    use TailleProduit;

    public $quantities = [];
    public $taille = [];

    public function mount()
    {
        // Initialisation des quantités depuis la session ou la base de données
        $paniers = session()->get('paniers', []);
        $tailles = $this->getListTailleProduit(); 

        foreach ($paniers as $id => $details) {
            $this->quantities[$id] = $details['quantite'];
            $this->taille[$id] = $details['taille']; 
        }
    }
public function updateTaille($id){
    
    if (isset($this->paniers[$id])) {
        
        $this->paniers[$id]['taille'] = $taille;

        session()->put('cart', $this->paniers);

        // Optionally, notify the user
      //  $this->emit('message', 'Taille mise à jour avec succès');
   } else {
   
     return false;
   }



 return true;
}
    public function render()
    {
        $paniers_session = session('cart');
        $paniers = [];
        $taille = [];
      //  dd($paniers_session);
        foreach ($paniers_session as $session){
            $produit = produits::find($session['id_produit']);
            $selectedTaille = $session['taille'] ?? null;
         //   dd( $selectedTaille);
            if($produit){
                $paniers[]=[
                    'nom' => $produit->nom,
                    'id_produit' => $produit->id,
                    'photo' => $produit->photo,
                    'quantite' => $session['quantite'],
                  'taille' => $selectedTaille, 


                    'prix' => $produit->prix,
                    'total' => $session['quantite'] * $produit->prix,
                ];
                $this->total += $session['quantite'] * $produit->prix;
              // $total  += $paniers['quantite'] * $produit->prix;
             //  dd($paniers);
              
            }else{
                $this->delete($session['id_produit']);
            }
        }
//dd($paniers);
        $tailles = $this->getListTailleProduit();
        return view('livewire.front.panier', compact("paniers","tailles"));
    }

    public function updatedQuantities($value, $id)
    {
        // Mettre à jour la quantité dans la session
        $paniers = session()->get('paniers', []);
        if (isset($paniers[$id])) {
            $paniers[$id]['quantite'] = $value;
            session()->put('paniers', $paniers);

            // Tu peux ajouter une logique ici pour mettre à jour la base de données si nécessaire
        }

        // Optionnel : mettre à jour le total ou autres informations
        $this->emit('cartUpdated'); // Émettre un événement si nécessaire
    }


    public function update($id_produit,$quantite){
        //verifier que la qte nest pas inferieur a 1
        if($quantite < 1){
            $this->delete($id_produit);
            return false;
        }
        //find produit in session car and update quantity
        $panier = session('cart', []);
        $produit_existe = false;

        foreach ($panier as &$item) {
            if ($item['id_produit'] == $id_produit) {
                $item['quantite'] = $quantite;
                $produit_existe = true;
                break;
            }
        }

        if (!$produit_existe) {
            $panier[] = [
                'id_produit' => $id_produit,
                'quantite' => $quantite,
            ];
        }

        session(['cart' => $panier]);

        $this->total =0 ;
    }





    public function delete($id_produit){
        //delete produit from cart
        $panier = session('cart', []);
        $produit_existe = false;

        foreach ($panier as $key => &$item) {
            if ($item['id_produit'] == $id_produit) {
                unset($panier[$key]);
                $produit_existe = true;
                break;
            }
        }

        if (!$produit_existe) {
            $panier[] = [
                'id_produit' => $id_produit,
                'quantite' => 1,
            ];
        }

        session(['cart' => $panier]);

        $this->total =0 ;
    }




}


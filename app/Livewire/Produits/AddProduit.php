<?php

namespace App\Livewire\Produits;

use App\Models\{produits, Category, Marque};
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Http\Traits\TailleProduit;
use App\Http\Traits\ListColor;
use App\Http\Traits\ListColors;

class AddProduit extends Component
{
    use WithFileUploads;
    use  ListColor;
    use  ListColors;
    use TailleProduit;


  
//public $taille=[];
    public $nom,$tags,$stock,$taille=[],$couleur=[], $prix,$sur_devis, $category_id,$photo, $photos, $prix_achat, $photo2, $photos2, $produit, $reference, $description,$marque_id ;


    public function mount($produit)
    {
        if ($produit) {
            $this->produit = $produit;
            $this->nom = $produit->nom;
            $this->stock = $produit->stock;
            $this->tags = $produit->tags;
            $this->category_id = $produit->category_id;
        //    $this->marque_id = $produit->marque_id;
            $this->reference = $produit->reference;
            $this->prix = $produit->prix;
            $this->prix_achat = $produit->prix_achat;
            $this->photo2 = $produit->photo;
            $this->photos2 = $produit->photos;
            $this->description = $produit->description;
            $this->sur_devis = $produit->sur_devis ?? 0;
            // $this->couleur = $produit->couleur;
             $this->taille = $produit->taille;
             if (is_string($produit->couleur)) {
                $this->produit->couleur = json_decode($produit->couleur, true);
            }

        }
     
    }





    public function render()
    {
        $categories = Category::all();
      //  $marques = Marque::all();
        $couleurs = $this->getListColor();
        $colors = $this->getListColors();
      //  dd($colors);
       $tailles = $this->getListTailleProduit();
        return view('livewire.produits.add-produit', compact('colors','categories', 'couleurs','tailles'));
    }






    //validation
    public function create()
    {
        $data =  $this->validate([
            'nom' => 'required|string',
            'description' => 'required|string|max:260',
         //   'tags' => 'nullable|string|max:260',
            'reference' => 'required|string|unique:produits,reference',
            'prix' => 'nullable|numeric|gt:prix_achat',
            'prix_achat' => 'nullable|numeric',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'category_id' => 'required|integer|exists:categories,id',
            'sur_devis'=>'nullable',
           // 'marque_id' => 'nullable|integer|exists:marques,id',
            'couleur' => 'nullable|max:200',
            'taille' => 'nullable|max:200',
        ]);
        ;[
            'reference.required' => ' La reference',
            'nom.required' => 'Veuillez entrer votre nom',
           'prix.required' => 'Veuillez entrer  le prix',
           
            //'adresse.required' => 'Veuillez entrer votre addresse',
      
          ];


        $categories = Category::findOrFail($data[('category_id')]);

        $produit = new produits();
        $produit->nom = $this->nom;

        $produit->sur_devis = $this->sur_devis ?? false;
       /*  if ($produit->sur_devis) {
            $produit->stock = 1;
        } */
         $produit->description = $this->description;
        $produit->reference = $this->reference;
        // $produit->category = $this->category;

        $produit->category_id = $this->category_id;
      //  $produit->marque_id = $this->marque_id;
        $produit->couleur = $this->couleur;
        $produit->taille = $this->taille;



        $produit->prix = $this->prix;
        $produit->prix_achat = $this->prix_achat;
        $produit->photo = $this->photo->store('produits', 'public');
        if ($this->photos) {
            $photosPaths = [];
            foreach ($this->photos as $photo) {
                $photosPaths[] = $photo->store('produits', 'public');
            }
            $produit->photos = json_encode($photosPaths);
        }
        // $produit->save();

        $categories->produits()->save($produit);

        //reset input
        $this->reset();

        //flash message
        session()->flash('success', 'Produit ajouté avec succès');
    }





    public function update_produit()
    {
        if ($this->produit) {
            $this->validate([
                'nom' => 'required|string',
                'prix' => 'nullable|numeric|gt:prix_achat',
               
                'prix_achat' => 'nullable|numeric',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
                'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            //    'marque_id' => 'nullable|integer|exists:marques,id',
                'sur_devis'=>'nullable',
                'couleur' => 'nullable|max:2000',
                'taille' => 'nullable|max:2000',
            ]);



            $this->produit->nom = $this->nom;
            $this->produit->sur_devis = $this->sur_devis;
            $this->produit->description = $this->description;
            $this->produit->reference = $this->reference;
            $this->produit->couleur= $this->couleur;
            $this->produit->taille= $this->taille;
            
        
            $this->produit->prix = $this->prix;
            $this->produit->prix_achat = $this->prix_achat;
          ///  $this->produit->marque_id = $this->marque_id;

            if ($this->photo) {
                //delete old photo
                if ($this->produit->photo) {
                    Storage::disk('public')->delete($this->produit->photo);
                }
                $this->produit->photo = $this->photo->store('produits', 'public');
            }

            if ($this->photos) {
                $photosPaths = [];
                foreach ($this->photos as $photo) {
                    $photosPaths[] = $photo->store('produits', 'public');
                }
                $this->produit->photos = json_encode($photosPaths);
            }
            $this->produit->save();


            $this->resetInput();

            return redirect()->route('produits')->with('success', "Produit modifié avec succès");
        }
    }










    public function resetInput()
    {
        $this->nom = '';
        $this->tags = '';
        $this->prix = '';
        $this->photo = '';
        $this->photos = '';
    }
}

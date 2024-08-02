<section class="middle">
    <div class="container">
    
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="text-center d-block mb-5">
                    <h2>Mon panier</h2>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-between">
            <div class="col-12 col-lg-7 col-md-12">
                <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                   
                        
                    @forelse($paniers ?? [] as $id => $details)
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <!-- Image -->
                                <a  href="{{ route('details-produits', ['id' => $details['id_produit'], 'slug'=>Str::slug(Str::limit($details['nom'], 10))]) , }}"><img src="{{ Storage::url($details['photo']) }}" alt="..." class="img-fluid"></a>
                            </div>
                            <div class="col d-flex align-items-center justify-content-between">
                                <div class="cart_single_caption pl-2">
                                    <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{ $details['nom'] }}</h4>
                                  <h4 class="fs-md ft-medium mb-3 lh-1">{{ $details['prix'] }}</h4>
                                   <div class="row">
                                    

                                    <div class="col"><h4 class="fs-md ft-medium mb-3 lh-1">Taille</h4></div>
                                    <div class="col">
                                   
                                        
                                    
                                      {{ $details['taille'] }}

                               
                                    </div>
                                   </div>



                        
                                    <div class="d-flex justify-content-between btn-group-qte">
                                        <button class="btn minus" type="button"  wire:click="update({{ $details['id_produit'] }},{{ $details['quantite'] - 1 }})">
                                         -
                                         </button>
                                        <div class="qte my-auto  w-100">
                                        {{ $details['quantite'] }}
                                        </div>
                                        <button type="button" class="btn plus"   wire:click="update({{ $details['id_produit'] }},{{ $details['quantite'] + 1 }})">
                                         +
                                         </button>
                                    </div>
                                    <style>
                                        .btn-group-qte {
    display: flex;
    align-items: center;
    gap: 10px; /* Adjust spacing between buttons and quantity display */
}

.btn-group-qte .btn {
    font-size: 1.2rem; /* Adjust the font size */
    padding: 5px 10px; /* Adjust padding for buttons */
    border-radius: 5px; /* Round corners */
}

.btn-group-qte .minus {
    background-color: #f8d7da; /* Light red color for minus button */
    border: 1px solid #f5c6cb; /* Border color matching the background */
}

.btn-group-qte .plus {
    background-color: #d4edda; /* Light green color for plus button */
    border: 1px solid #c3e6cb; /* Border color matching the background */
}

.btn-group-qte .qte {
    font-size: 1.2rem; /* Font size for quantity display */
    font-weight: bold; /* Bold text */
    text-align: center; /* Center text */
    width: 50px; /* Fixed width for quantity display */
}

                                    </style>
                                    <br><br>

                                    <td class="product-subtotal"><span class="amount"> {{ $details['prix'] * $details['quantite'] }}
                                        DT</span></td>

                                       
                                </div>
                                
                                
                              

                                <div class="fls_last">
                                    {{-- <button class="close_slide gray"><i class="ti-close"></i></button> --}}
                                    <form   wire:click="delete({{ $details['id_produit'] }})">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-flat show_confirm" {{-- data-toggle="tooltip" --}} title='Delete'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="15" style="background-color: white; fill:#e60a0a;"
                                            height="" fill="currentColor">
                                            <path
                                                d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                                            </path>
                                        </svg></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>

                     @empty
                           <tr>
                               <td colspan="6">
                                   <div class="text-center p-5">
                                       <br>
                                       <div class="text-center p-5"><img  style="  width: 100px;
                                        height: 100px;"
                                                                                        src="https://img.icons8.com/?size=100&id=15867&format=png&color=000000"
                                                                                        alt="shopping-cart--v1" />
                                                                                    <br>
                                                                                    <h5>
                                                                                        Vous n'avez aucun produit dans le panier pour le momment
                                                                                    </h5>
                                
                                                                                </div>
                                       <br>

                                   </div>
                               </td>
                           </tr>
                  @endforelse
                    
                
                    
                </ul>
                
                <div class="row align-items-end justify-content-between mb-10 mb-md-0">
                    <div class="col-12 col-md-7">
                        <!-- Coupon -->
                     
                    </div>
                    
                </div>
            </div>
            
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card mb-4 gray mfliud">
                  <div class="card-body">
                    <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                      <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                        <span>Récapitulation de la commande</span> <span class="ml-auto text-dark ft-medium"><span>Articles</span>: {{ count($paniers) }} </span>
                      </li>
                      
                      <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                        <span>Total</span> <span class="ml-auto text-dark ft-medium">{{ $total }} DT</span>
                      </li>
                      <li class="list-group-item fs-sm text-center">
                        Frais d'expédition calculés à la caisse *
                      </li>
                    </ul>
                  </div>
                </div>
                
                <a class="btn btn-block btn-dark mb-3" href="{{ url('/commander') }}">Commander</a>
                
                <a class="btn-link text-dark ft-medium" href="{{ url('shop') }}">
                  <i class="ti-back-left mr-2"></i> Continuer les achats
                </a>
            </div>
            
        </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
     
         $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Le produit a été retiré du panier`,
                //  text: "Si vous supprimez ceci, il disparaîtra.",
                  icon: "warning",
                  buttons: false,
                  dangerMode: true,
                  timer: 2000,
                 
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
              setTimeout(() => {
        swal.close();
    }, 2000);
          });
      
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.update-quantity').forEach(select => {
        select.addEventListener('change', function() {
            const quantity = this.value;
            const productId = this.getAttribute('data-product-id');
            
            fetch(`/update-quantity/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Met à jour le total ou affiche un message de succès
                    console.log('Quantité mise à jour avec succès!');
                    location.reload(); // Optionnel : pour recharger les totaux ou autres parties du panier
                } else {
                    console.error('Erreur lors de la mise à jour de la quantité');
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    });
});

    </script>
</section>

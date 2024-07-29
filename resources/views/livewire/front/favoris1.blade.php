   <!--cart start-->
   <div class="cart-area pt-120 pb-120">
       <div class="container container-small">
           <div class="row">
               <div class="col-12">
                   <div class="table-content">
                       <table class="table">
                           <thead style=" background-color: #2212fa22;">
                               <tr>
                                   <th class="product-remove"></th>
                                   <th class="cart-product-name">Prduit</th>
                                   <th class="product-price"> Date d'ajout</th>
                                   <th class="product-price"> Prix</th>
                                   <th class="product-quantity product-quantity-center">Ajouter au panier</th>
                                   <th class="product-status">Statut</th>
                                   {{-- <th class="product-subtotal">Total</th> --}}
                               </tr>
                           </thead>
                           <tbody>
                               @forelse ($favoris as $key => $favo)
                                   <tr>
                                       <td class="product-remove">
                                        

                                        
                                           <form method="GET" action="{{ url('favoris', $favo->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-flat show_confirm" data-toggle="tooltip" title='Delete'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                width="25" style="background-color: #b2e21522; fill:#f80a0a;"
                                                height="25" fill="currentColor">
                                                <path
                                                    d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                                                </path>
                                            </svg></button>
                                        </form>

                                       </td>
                                       <td class="product-thumbnail">
                                            <a href="{{ route('details-produits', ['id' => $favo->produit->id, 'slug'=>Str::slug(Str::limit($favo->produit->nom, 10))]) , }}">
                                    <img
                                    src="{{ Storage::url($favo->produit->photo) }}"
                                    alt=" {{ $favo->produit->nom }}" srcset="">
                                </a> 
                                           <div class="product-thumbnail__wrapper">
                                                <a 
                                    href="{{ route('details-produits', ['id' => $favo->produit->id, 'slug'=>Str::slug(Str::limit($favo->produit->nom, 10))]) , }}">
                                     {{
                                    $favo->produit->nom }}</a> 
                                           </div>
                                       </td>
                                       <td class="product-price"><span class="amount amount-2">
                                               {{ $favo->created_at }}</span></td>

                                       <td class="product-price"><span class="amount amount-2">
                                               {{ $favo->produit->getPrice() }} DT</span></td>

                                       <td class="product-quantity">
                                          @if($favo->produit->sur_devis==false)
                                          <button type="button" class="rr-btn "
                                          onclick="AddToCart( {{ $favo->produit->id }} )">
                                          Ajouter au panier
                                      </button>
                                      @else
                                      <button type="button" class="rr-btn"
                                      onclick="AddToCart( {{ $favo->produit->id }} )">
                                       Commander
                                  </button>
                                            
                                          @endif
                                          
                                       </td>
                                       <td>
                                           @if ($favo->produit->stock > 0)
                                               <label class="badge bg-success"> Disponible</label>
                                           @else
                                               <label class="badge bg-danger"> Indisponible</label>
                                           @endif

                                           {{-- {{ $favo->produit->statut }} --}}
                                       </td>
                                       {{--   <td class="product-subtotal"><span class="amount">$230.50</span></td> --}}
                                   </tr>


                               @empty
                                   <tr>
                                       <td colspan="6 ">
                                           <div class="text-center p-5"><svg xmlns="http://www.w3.org/2000/svg"
                                                   viewBox="0 0 24 24" width="120" height="120"
                                                   fill="currentColor">
                                                   <path
                                                       d="M12.001 4.52853C14.35 2.42 17.98 2.49 20.2426 4.75736C22.5053 7.02472 22.583 10.637 20.4786 12.993L11.9999 21.485L3.52138 12.993C1.41705 10.637 1.49571 7.01901 3.75736 4.75736C6.02157 2.49315 9.64519 2.41687 12.001 4.52853ZM18.827 6.1701C17.3279 4.66794 14.9076 4.60701 13.337 6.01687L12.0019 7.21524L10.6661 6.01781C9.09098 4.60597 6.67506 4.66808 5.17157 6.17157C3.68183 7.66131 3.60704 10.0473 4.97993 11.6232L11.9999 18.6543L19.0201 11.6232C20.3935 10.0467 20.319 7.66525 18.827 6.1701Z">
                                                   </path>
                                               </svg> <br>
                                               <h5>
                                                   Vous n'avez de favoris pas pour l'instant.
                                               </h5>
                                           </div>
                                       </td>
                                   </tr>
                               @endforelse

                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!--cart end-->
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> 
   <script type="text/javascript">
    
        $('.show_confirm').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                 title: `Êtes-vous sûr de vouloir supprimer?`,
                 text: "Si vous supprimez ceci, il disparaîtra.",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {
                 form.submit();
               }
             });
         });
     
   </script>
     
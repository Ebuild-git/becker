<div>
    @foreach ($produits as $produit)
        <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
            <div class="cart_single d-flex align-items-center">
                <div class="cart_selected_single_thumb">
                    <a href="#">
                        <img src="{{  $produit['photo'] }}" width="60" class="img-fluid" alt="" />
                    </a>
                </div>
                <div class="cart_single_caption pl-2">
                    <h4 class="product_title fs-sm ft-medium mb-0 lh-1">
                        {{  Str::limit($produit['nom'] , 15) }}
                    </h4>
                    <p class="mb-2">
                        <span class="text-dark ft-medium small">
                            Qté : {{  $produit['quantite'] }}
                        </span>, 
                        <span
                            class="text-dark small"></span></p>
                    <h4 class="fs-md ft-medium mb-0 lh-1">
                        {{  $produit['prix'] }} DT
                    </h4>
                </div>
            </div>
            <div class="fls_last"> <a href="#"class="cart-item__remove" onclick="DeleteToCart({{  $produit['id_produit']  }})">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" style=" fill:red"
                        height="15" fill="currentColor">
                        <path
                            d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
</div>

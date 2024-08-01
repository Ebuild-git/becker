@extends('front.fixe')
@section('titre', 'Shop')
@section('body')



    <!-- Body main wrapper start -->
    <main>

        
                    <!-- ======================= Shop Style 1 ======================== -->
                    <section class="bg-cover" style="background:url(/icons/bg-shop.jpg) repeat; " {{--  data-background="/icons/bg-shop.jpg" --}}>
                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="text-left py-5 mt-3 mb-3">
                                        <h1 class="ft-medium mb-3">Shop</h1>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- ======================= Shop Style 1 ======================== -->
                    
                    
                    <!-- ======================= Filter Wrap Style 1 ======================== -->
                    <section class="py-3 br-bottom br-top">
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                                            <li class="breadcrumb-item"><a href="{{ url('/shop') }}">Shop</a></li>
                                           
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- ============================= Filter Wrap ============================== -->
                    
                    
                    <!-- ======================= All Product List ======================== -->
                    <section class="middle">
                        <div class="container">
                            <div class="row">
                                
                                
                                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 p-xl-0">
                                    <div class="search-sidebar sm-sidebar border">
                                        <div class="search-sidebar-body">
                                        
                                            <!-- Single Option -->
                                            <div class="single_search_boxed">
                                                <div class="widget-boxed-header px-3">
                                                   
                                                    
                                                </div>
                                                <div class="widget-boxed-body">
                                                    <div class="side-list no-border">
                                                        <div class="filter-card" id="shop-categories">
                                                            
                                                            <!-- Single Filter Card -->
                                                            <div class="single_filter_card">
                                                                <h5><a href="#shoes" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button"> Les categories<i class="accordion-indicator ti-angle-down"></i></a></h5>
                                                                 
                                                                <div class="collapse" id="shoes" data-parent="#shop-categories">
                                                                    <div class="card-body">
                                                                        <div class="inner_widget_link">
                                                                            <ul>
                                                                                @foreach ($categories as $category)
                                                                                <li><a  href="/category/{{ $category->id }}"
                                                                                    class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}">  {{ Str::limit($category->nom,25) }}<span>{{ $category->produits->count() }}</span></a></li>
                                                                          @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            
                                                           
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        {{--     @foreach ($categories as $category)
                                                                <li>
                                                                    <a href="/category/{{ $category->id }}"
                                                                        class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}">
                                                                        {{ Str::limit($category->nom,25) }}
                                                                    </a>    
                                                                </li>
                                                            @endforeach --}}
                                            
                                            <!-- Single Option -->
                                           {{--  <div class="single_search_boxed">
                                                <div class="widget-boxed-header">
                                                    <h4><a href="#pricing" data-toggle="collapse" aria-expanded="false" role="button">Pricing</a></h4>
                                                </div>
                                                <div class="widget-boxed-body collapse show" id="pricing" data-parent="#pricing">
                                                    <div class="side-list no-border mb-4">
                                                        <div class="rg-slider">
                                                             <input type="text" class="js-range-slider" name="my_range" value="" />
                                                        </div>		
                                                    </div>
                                                </div>
                                            </div> --}}
                                            @php
                                                
                                                $max = DB::table('produits')->max('prix');
                                            @endphp
                                            
                                                <div class="single_search_boxed">
                                                   
                                                    <div class="widget-boxed-header">
                                                        <h4><a href="#pricing" data-toggle="collapse" aria-expanded="false" role="button">Prix</a></h4>
                                                    </div>
                                                    <div class="widget-boxed-body collapse show" id="pricing"data-min='0' data-parent="{{ $max }}">

                                                        <div class="side-list no-border mb-4">
                                                            <form action="/shop" method="post">
                                                                @csrf
                                                            <input class="form-control" type="number" name="min_price" placeholder="Prix Min">
                                                            <input class="form-control" type="number" name="max_price" placeholder="Prix Max ">
                                                            <button class="btn btn-success" type="submit">Filtrer par prix</button>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                          

                                           {{--  <form method="GET" action="{{ url('/shop') }}">
                                               
                                            
                                                <input class="form-control" type="number" name="min_price" placeholder="Min Price">
                                                <input class="form-control" type="number" name="max_price" placeholder="Max Price">
                                            
                                                <button   class="btn btn-success" type="submit">Filter</button>
                                            </form> --}}
                                          
                                            
                                            
                                           
                              
                                           
                                         
                                          
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                                    
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="border mb-3 mfliud">
                                                <div class="row align-items-center py-2 m-0">
                                                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                                        <h6 class="mb-0"></h6>

                                                        <form class="form m-0 p-0" role="search" action="{{ url('search') }}" method="get">
                                                            @csrf
                                                            <div class="form-group d-flex align-items-center">
                                                                <input id="search"  type="search" name="search" class="form-control col-xl-12"
                                                                    value="{{ $nom ?? '' }}"
                                                                    placeholder="Rechercher un produit" required>
                                
                                
                                                            
                                
                                                                <button type="submit" w-100 value="Search" class="btn d-block full-width btn-dark">Chercher
                                                                </button>
                                                            </div>
                                
                                
                                                        </form>
                                                    </div>
                                                    
                                                    <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
                                                        <div class="filter_wraps d-flex align-items-center justify-content-end m-start">
                                                            <div class="single_fitres mr-2 br-right">
                                                                <label for="">Filtrer par:</label>
                                                                <select class="lan-5" name="sort_by" id="sort_by"
                                                                onchange="window.location.href=this.value;">
                                                                <option value="{{ url('shop') }}">Default</option>
                                                                <option value="{{ url('croissant') }}">Croissant</option>
        
                                                                <option value="{{ url('decroissant') }}">Décroissant</option>
        
        
        
                                                            </select>
                                                            </div>
                                                            <div class="single_fitres">{{-- 
                                                                <a href="shop-style-5.html" class="simple-button active mr-1"><i class="ti-layout-grid2"></i></a>
                                                                <a href="shop-list-sidebar.html" class="simple-button"><i class="ti-view-list"></i></a>
                                                            --}} </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- row -->
                                    <div class="row align-items-center rows-products">
                                        
                                        <!-- Single -->
                                        @if ($produits)
                                        @foreach ( $produits as $key => $produit )
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                            <div class="product_grid card b-0">
                                                 @if ($produit->inPromotion())
                                                <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper"> - {{ $produit->inPromotion()->pourcentage }} %</div>
                                                @endif
                                   
                                  
                                
                                                <div class="card-body p-0">
                                                    <div class="shop_thumb position-relative">
                                                        <a class="card-img-top d-block overflow-hidden"href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}"><img class="card-img-top"  src="{{ Storage::url($produit->photo) }}" alt="..."></a>
                                                        
                                                       
                                                        <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                            <div class="edlio"><a href="#" data-toggle="modal" data-target="#{{ $produit->id }}" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer b-0 p-0 pt-2 bg-white">
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <div class="text-left">
                                                            @foreach ($produit->couleur ?? [] as $key => $value)
                                                            <div class="form-check form-option form-check-inline mb-1">
                                                                <input class="form-check-input" type="radio" name="color2" id="white2">
                                                                <label class="form-option-label small rounded-circle" for="white2"><span class="form-option-color rounded-circle blc5"   style="background-color: {{ $value }} ;color:{{ $value }};"></span></label>
                                                            </div>
                                                            @endforeach
                                                         
                                                        </div>
                                                        @if (Auth()->user())
                                                        <div class="text-right">
                                                            <button  onclick="AddFavoris({{ $produit->id }})" class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="text-left">
                                                        <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a  href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a></h5>
                                                        <div class="elis_rty">
                                                            <span class="ft-bold text-dark fs-sm">
                                                                @if ($produit->inPromotion())
                                                            <span class=" small">
                                                                - {{ $produit->inPromotion()->pourcentage }} %
                                                            </span>
                                                            <b class="text-success">
                                                                {{ $produit->getPrice() }} DT
                                                            </b>
                                                            <br>
                                                            <strike>
                                                                <span class="text-danger small">
                                                                    {{ $produit->prix }} DT
                                                                </span>
                                                            </strike>
                                                        @else
                                                            {{ $produit->getPrice() }} DT
                                                        @endif
                                                    </span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                 
                                        @endforeach

                                        @endif
                                    
                                        
                                    </div>
                                    <!-- row -->
                                    
                                   {{--  <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                                            <a href="#" class="btn stretched-link borders m-auto"><i class="lni lni-reload mr-2"></i>Load More</a>
                                        </div>
                                    </div> --}}
                                </div>
                                
                            </div>
                        </div>
                    </section>
                    <!-- ======================= All Product List ======================== -->
                    
                
                    <!-- Product View Modal -->
                    @if ($produits)
                    @foreach ($produits as $key => $produit)
                    <div class="modal fade lg-modal" id="{{ $produit->id }}" tabindex="-1" role="dialog" aria-labelledby="quickviewmodal" aria-hidden="true">
                        <div class="modal-dialog modal-xl login-pop-form" role="document">
                            <div class="modal-content" id="quickviewmodal">
                                <div class="modal-headers">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span class="ti-close"></span>
                                    </button>
                                  </div>
                            
                                <div class="modal-body">
                                    <div class="quick_view_wrap">
                            
                                        <div class="quick_view_thmb">
                                            <div class="quick_view_slide">
                                                <a  href="{{ Storage::url($produit->photo) }}"  data-lightbox="roadtrip"
                                                    class="d-block mb-4">
                            
                                                    <img src="{{ Storage::url($produit->photo) }}"
                                                        {{-- class="img-fluid rounded" --}}class="img-responsive m-auto"  alt="" />
                            
                                                </a>
                                                @foreach (json_decode($produit->photos) ?? [] as $photo)
                                                <div class="single_view_slide"><img src="{{ Storage::url($photo) }}" class="img-fluid" alt="" /></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                        <div class="quick_view_capt">
                                            <div class="prd_details">
                                                
                                                <div class="prt_01 mb-1"><span class="text-light bg-info rounded px-2 py-1">Categorie: {{ $produit->categories->nom }}</span></div>
                                                <div class="prt_02 mb-2">
                                                    <h2 class="ft-bold mb-1">{{ $produit->nom }}</h2>
                                                    <div class="text-left">
                                                        <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                           
                                                        </div>
                                                        <div class="elis_rty">
                                                           
                                                            @if ($produit->inPromotion())
                                                                <span class="small">
                                                                    - {{ $produit->inPromotion()->pourcentage }} %
                                                                </span>
                                                                <b class="">
                                                                    {{ $produit->getPrice() }} DT
                                                                </b>
                                                                <br>
                                                                <strike>
                                                                    <span class="text-danger small">
                                                                        {{ $produit->prix }} DT
                                                                    </span>
                                                                </strike>
                                                            @else
                                                                {{ $produit->getPrice() }} DT
                                                            @endif

                                                            <span
                                                                class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm">
                                                                @if ($produit->stock > 0)
                                                                    <label class="badge bg-success"> Stock
                                                                        disponible</label>
                                                                @else
                                                                    <label
                                                                        class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm">
                                                                        Stock non disponible</label>
                                                                @endif
                                                            </span>
                                                        </div>


                                                      
                                                    </div>
                                                </div>
                                                
                                                <div class="prt_03 mb-3">
                                                    <p>{{ $produit->description }}</p>
                                                </div>
                                                
                                                <div class="prt_04 mb-2">
                                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium">Couleur(s):</p>
                                                    <div class="text-left">
                                                        @foreach ($produit->couleur ?? [] as $key => $value)
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio" name="acolor8" id="awhite8">
                                                            <label class="form-option-label rounded-circle" for="awhite8"><span class="form-option-color rounded-circle blc7" style="background-color: {{ $value }} ;color:{{ $value }};" ></span></label>
                                                        </div>
                                                        @endforeach
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="prt_04 mb-4">
                                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium">Tailles(s):</p>
                                                    <div class="text-left pb-0 pt-2">
                                                       {{--  @foreach ($produit->taille as $taille)
                                                        <div class="form-check size-option form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="taille" id="taille" checked="">
                                                            <label class="form-option-label" for="taille">{{ $taille }}</label>
                                                        </div>
                                                        @endforeach --}}

                                                        @foreach ($produit->taille as $index => $taille)
                                                        <div class="form-check size-option form-option form-check-inline mb-2">
                                                            <input type="radio" class="form-check-input" name="taille" value="{{ $taille }}"
                                                                   id="taille-{{ $produit->id }}-{{ $index }}" {{ $loop->first ? 'checked' : '' }}>
                                                            <label class="form-option-label" for="taille-{{ $produit->id }}-{{ $index }}">{{ $taille }}</label>
                                                        </div>
                                                    @endforeach
                                                   
                                                    </div>
                                                </div>
                                               
                                                <div class="prt_05 mb-4">
                                                    <div class="form-row mb-7">
                                                        <div class="col-12 col-lg-auto">
                                                            <!-- Quantity -->
                                                            <div class="quantity">
                                                                Quantité:
                                                                <div class="quantity__group">
                                                                    <span class="quantity-control minus"><i class="far fa-minus"></i></span>
                                                                    <input type="number" class="input-text qty text" name="quantite"
                                                                        value="1" id="qte-{{ $produit->id }}" autocomplete="off">
                                                                    <span class="quantity-control plus"><i class="far fa-plus"></i></span>
                                                                </div>
                                                            </div>
                                                            <style>
                                                                .quantity {
                                                                    display: flex;
                                                                    align-items: center;
                                                                }
                        
                                                                .quantity__group {
                                                                    display: flex;
                                                                    align-items: center;
                                                                }
                        
                                                                .quantity-control {
                                                                    cursor: pointer;
                                                                    padding: 5px;
                                                                    font-size: 1.2em;
                                                                }
                        
                                                                .quantity-control.minus {
                                                                    color: red;
                                                                    /* Change color as needed */
                                                                }
                        
                                                                .quantity-control.plus {
                                                                    color: green;
                                                                    /* Change color as needed */
                                                                }
                        
                                                                .input-text.qty {
                                                                    width: 70px;
                                                                    text-align: center;
                                                                    border: 1px solid #ccc;
                                                                    margin: 0 5px;
                                                                    font-size: 1.5em;
                                                                }
                                                            </style>
                                                        </div>
                                                        <div class="col-12 col-lg">
                                                            <!-- Submit -->
                                                            <button type="submit"
                                                                onclick="AddToCart( {{ $produit->id }} )"
                                                                class="btn btn-block custom-height bg-dark mb-2">
                                                                <i class="lni lni-shopping-basket mr-2"></i>Ajouter au
                                                                panier
                                                            </button>
                                                        </div>
                                                        <div class="col-12 col-lg-auto">
                                                            <!-- Wishlist -->
                                                            @if (Auth()->user())
                                                                <button onclick="AddFavoris({{ $produit->id }})"
                                                                    class="btn custom-height btn-default btn-block mb-2 text-dark"
                                                                    data-toggle="button">
                                                                    <i class="lni lni-heart mr-2"></i>Favori
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="prt_06">
                                                    <p class="mb-0 d-flex align-items-center">
                                                      
                                                    </p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <!-- End Modal -->
                    
            
                 
               
            
    </main>




@endsection

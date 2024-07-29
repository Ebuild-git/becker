@extends('front.fixe')
@section('titre', 'Shop')
@section('body')



    <!-- Body main wrapper start -->
    <main>

        <section class="bg-cover" style="background:url(https://via.placeholder.com/1920x900) no-repeat;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="text-left py-5 mt-3 mb-3">
                            <h1 class="ft-medium mb-3">Shop</h1>
                            <ul class="shop_categories_list m-0 p-0">
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Speakers</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======================= Filter Wrap Style 1 ======================== -->
        <section class="py-3 br-bottom br-top">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Women's</li>
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
                                        <h4 class="mt-3">Categories</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="side-list no-border">
                                            <div class="filter-card" id="shop-categories">


                                                <!-- Single Filter Card -->
                                                @foreach ($categories as $category)
                                                    <div class="single_filter_card">

                                                        <h5><a href="#accessories" data-toggle="collapse" class="collapsed"
                                                                aria-expanded="false" role="button">{{ $category->nom }}<i
                                                                    class="accordion-indicator ti-angle-down"></i></a></h5>


                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                     <div class="widget-boxed-header">
                                        <h4><a href="#pricing" data-toggle="collapse" aria-expanded="false"
                                                role="button">Pricing</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse show" id="pricing" data-parent="#">
                                        <div class="side-list no-border mb-4">
                                            <div class="rg-slider">
                                                <input type="text" class="js-range-slider" name="my_range"
                                                    value="" />
                                            </div>
                                        </div>
                                    </div> 
{{-- 
                                    <form action="/shop" method="post">
                                        @csrf
                                        <div class="tp-product-widget-filter">
                                            <div id="slider-range" data-min="0" data-max="{{ $max_prix }}"></div>
                                            <div
                                                class="tp-product-widget-filter-info product_filter d-flex align-items-center justify-content-between mb-10">
                                                <i> Prix: </i>
                                                <span class="input-range">
                                                    <input style="" type="text" id="amount" readonly>
                                                    <input type="hidden" name="price_range" id="price_range" />
                                                    
                                                </span>
                                            </div>
                                            <button class="btn btn-success" type="submit">
                                                Filter
                                            </button>
                                        </div>
                                    </form> --}}
                                </div>

                               
                              
                               
                              
                               

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="border mb-3 mfliud">
                                    <div class="row align-items-center py-2 m-0">
                                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                            <h6 class="mb-0">315 Items Found</h6>
                                        </div>

                                        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
                                            <div
                                                class="filter_wraps d-flex align-items-center justify-content-end m-start">
                                                <div class="single_fitres mr-2 br-right">
                                                    <select class="lan-5" name="sort_by" id="sort_by"
                                                        onchange="window.location.href=this.value;">
                                                        <option value="{{ url('shop') }}">Default</option>
                                                        <option value="{{ url('croissant') }}">Croissant</option>

                                                        <option value="{{ url('decroissant') }}">Décroissant</option>



                                                    </select>
                                                </div>
                                                <div class="single_fitres">
                                                    <a href="shop-style-5.html" class="simple-button active mr-1"><i
                                                            class="ti-layout-grid2"></i></a>
                                                    <a href="shop-list-sidebar.html" class="simple-button"><i
                                                            class="ti-view-list"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- row -->
                        <div class="row align-items-center rows-products">

                            @foreach ($produits as $key => $product)
                                @if ($produits)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                        <div class="product_grid card b-0">
                                            <div
                                                class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">
                                                @if($product->inPromotion())
                                                - {{ $product->inPromotion()->pourcentage }} %</div>
                                                @endif
                                             
                                            <div class="card-body p-0">
                                                <div class="shop_thumb position-relative">
                                                    <a class="card-img-top d-block overflow-hidden"
                                                    href="{{ route('details-produits', ['id' => $product->id, 'slug' => Str::slug(Str::limit($product->nom, 10))]) }}"><img class="card-img-top"
                                                            src="{{ Storage::url($product->photo) }}" alt="..."></a>


                                                            <div class="product-left-hover-overlay">
                                                                <ul class="left-over-buttons">
                                                              
                                                                    @if (Auth()->user())
                                                                        <li><a 
                                                                                onclick="AddFavoris({{ $product->id }})"
                                                                                class="d-inline-flex circle align-items-center justify-content-center snackbar-wishlist"><i
                                                                                    class="far fa-heart position-absolute"></i></a>
                                                                        </li>
                                                                    @endif
                                                                    <li><a 
                                                                            onclick="AddToCart({{ $product->id }})"
                                                                            class="d-inline-flex circle align-items-center justify-content-center snackbar-addcart"><i
                                                                                class="fas fa-shopping-basket position-absolute"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                    <div
                                                        class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                        <div class="edlio"><a href="#" data-toggle="modal"
                                                                data-target="#{{ $product->id }}"
                                                                class="text-white fs-sm ft-medium"><i
                                                                    class="fas fa-eye mr-1"></i>Voir détails</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer b-0 p-0 pt-2 bg-white">
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <div class="text-left">

                                                    </div>
                                                    @if (Auth()->user())
                                                        <div class="text-right">
                                                            <button class="btn auto btn_love snackbar-wishlist"
                                                                onclick="AddFavoris({{ $product->id }})"><i
                                                                    class="far fa-heart"></i></button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="text-left">
                                                    <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a
                                                            href="shop-single-v1.html">{{ $product->nom }}</a></h5>
                                                    <div class="elis_rty">
                                                      
                                                            @if ($product->inPromotion())
                                                            <span class=" small">
                                                                - {{ $product->inPromotion()->pourcentage }} %
                                                            </span>
                                                            <b class="text-success">
                                                                {{ $product->getPrice() }} DT
                                                            </b>
                                                            <br>
                                                            <strike>
                                                                <span class="text-danger small">
                                                                    {{ $product->prix }} DT
                                                                </span>
                                                            </strike>
                                                        @else
                                                            {{ $product->getPrice() }} DT
                                                        @endif
                                                        
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach



                        </div>
                        <!-- row -->

                        {{-- <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                                <a href="#" class="btn stretched-link borders m-auto"><i
                                        class="lni lni-reload mr-2"></i>Load More</a>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>


            <!-- Product View Modal -->
            @foreach ($produits as $key => $product)
                @if ($produits)
                    <div class="modal fade lg-modal" id="{{ $product->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="quickviewmodal" aria-hidden="true">
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
                                                  @foreach (json_decode($product->photos) ?? [] as $photo)
                                                <div class="single_view_slide">  <img class="img-responsive m-auto" src="{{ Storage::url($photo) }}"
                                                    alt=""></div> 
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="quick_view_capt">
                                            <div class="prd_details">

                                                <div class="prt_01 mb-1"> <span
                                                class="text-light bg-info rounded px-2 py-1">Category: {{ $product->categories->nom ?? ' ' }}</span></div>
                                                <div class="prt_02 mb-2">
                                                    <h2 class="ft-bold mb-1">{{ $product->nom }}</h2>
                                                    <div class="text-left">
                                                        <div
                                                            class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                            {{-- <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="small">(412 Reviews)</span> --}}
                                                        </div>
                                                        <div class="elis_rty">
                                                            {{-- <span
                                                                class="ft-medium text-muted line-through fs-md mr-2">
                                                                $199</span>
                                                            <span class="ft-bold theme-cl fs-lg mr-2">$110</span> --}}

                                                            @if ($product->inPromotion())
                                                            <span class=" small">
                                                                - {{ $product->inPromotion()->pourcentage }} %
                                                            </span>
                                                            <b class="text-success">
                                                                {{ $product->getPrice() }} DT
                                                            </b>
                                                            <br>
                                                            <strike>
                                                                <span class="text-danger small">
                                                                    {{ $product->prix }} DT
                                                                </span>
                                                            </strike>
                                                        @else
                                                          {{--   {{ $produit->getPrice() }} DT --}}
                                                        @endif

                                                            @if ($product->stock > 0)
                                                                <label class="badge bg-success"> Stock disponible</label>
                                                            @else
                                                                <label
                                                                    class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm">
                                                                    Stock non disponible</label>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="prt_03 mb-3">
                                                    <p>{{ $product->description }}</p>
                                                </div>

                                                <div class="prt_04 mb-2">
                                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium">Couleur(s):
                                                    </p>
                                                    <div class="text-left">
                                                        @foreach ($product->couleur ?? []  as $key=> $value )
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio" name="color8"
                                                                id="white8">
                                                            <label class="form-option-label rounded-circle"
                                                                for="white8"><span
                                                                    class="form-option-color rounded-circle blc7"    style="background-color: {{ $value }} ;color:{{ $value }};"></span></label>
                                                        </div>
                                                        @endforeach
                                                     
    
                                                       
                                                    </div>
                                                </div>

                                                <div class="prt_04 mb-4">
                                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium">Taille(s):
                                                    </p>
                                                    <div class="text-left pb-0 pt-2">
                                                        @foreach ($product->taille as $taille )
                                                        <div
                                                        class="form-check size-option form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio"
                                                            name="size" id="28" checked="">
                                                        <label class="form-option-label" for="28">{{ $taille }}</label>
                                                    </div>
                                                        @endforeach
                                                        
                                                       
                                                        
                                                    </div>
                                                </div>


                                                <div class="prt_05 mb-4">
                                                    <div class="form-row mb-7">
                                                        <div class="col-12 col-lg-auto">
                                                        
                                                    <div class="quantity">
                                                        <div class="quantity__group">
                                                            <span class="quantity-control minus"><i class="far fa-minus"></i></span>
                                                            <input type="number" class="input-text qty text" name="quantite"
                                                                value="1" id="qte-{{ $product->id }}" autocomplete="off">
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
                                                            width: 100px;
                                                            text-align: center;
                                                            border: 1px solid #ccc;
                                                            margin: 0 5px;
                                                            font-size: 2.5em;
                                                        }
                                                    </style>

                                                        </div>
                                                        <div class="col-12 col-lg">
                                                            <!-- Submit -->
                                                            <button type="submit"
                                                                onclick="AddToCart( {{ $product->id }} )"
                                                                class="btn btn-block custom-height bg-dark mb-2">
                                                                <i class="lni lni-shopping-basket mr-2"></i>Ajouter au
                                                                panier
                                                            </button>
                                                        </div>
                                                        <div class="col-12 col-lg-auto">
                                                            <!-- Wishlist -->


                                                             @if (Auth()->user()) 
                                                        
                                                            
                                                                <button type="button"  id="favorite-button-{{ $product->id }}" 
                                                                    class="btn custom-height btn-default btn-block mb-2 text-dark"
                                                                    onclick="AddFavoris({{ $product->id }})">

                                                                    <i class="lni lni-heart mr-2"></i>Favorie

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
                @endif
            @endforeach
            <!-- End Modal -->
        </section>

        <br><br>
        <br><br><br>
       
    </main>




@endsection

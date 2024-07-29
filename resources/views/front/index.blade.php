@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')

    <main>
        @php
            $config = DB::table('configs')->first();
            $service = DB::table('services')->get();
            $produit = DB::table('produits')->get();

        @endphp

        <body>


            <!-- ============================ Hero Banner  Start================================== -->
            <div class="home-slider margin-bottom-0">

                <!-- Slide -->
                @foreach ($banners as $key => $banner)
                    <div data-background-image="{{ Storage::url($banner->image) }}" class="item">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="home-slider-container">


                                        <!-- Slide Title -->
                                        <div class="home-slider-desc">
                                            <div class="home-slider-title mb-4">
                                                <h3 class="theme-cl fs-sm ft-ragular mb-0">{{ $banner->titre ?? ' ' }}</h3>
                                                {{--    <h1 class="mb-1 ft-bold lg-heading">{{ $banner->titre  ?? ' '}}<br>{{ $banner->sous_titre ?? ' ' }}</h1>  --}}
                                                <span class="trending"> {{ $banner->sous_titre ?? ' ' }}</span>
                                            </div>

                                            <a href="/shop" class="btn stretched-link borders">Visiter la boutique<i
                                                    class="lni lni-arrow-right ml-2"></i></a>
                                        </div>
                                        <!-- Slide Title / End -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <!-- ============================ Hero Banner End ================================== -->

            <!-- ======================= All Category ======================== -->

            <!-- ============================= Customer Features =============================== -->
<!-- ======================= Category Style ======================== -->
<br><br><br><br><br><br><br>
<br> <br>


<section class="p-0">
    
    <div class="container">
       
        <div class="row overlio">
            
				
        @foreach ($categories as $category) 
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
            <div class="cats_caption_wrap">
                <div class="cats_caption_thumb mb-2">
                    <a class="text-anim-2" href="/category/{{ $category->id }}"
                        class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}"><img  src="{{ Storage::url($category->photo) }}" class="img-fluid rounded" alt="" /></a>
                </div>
                <div class="cats_caption text-center">
                    <h4 class="m-0">{{ $category->nom }}</h4>
                    <span class="text-muted">{{ $category->produits->count() }} Collections</span>
                </div>
            </div>
        </div>
        
        @endforeach
          
          
            
        </div>
    </div>
</section>
<br><br><br>
<!-- ======================= Category Style 1 ======================== -->
            <br><br><br>
            <section class="px-0 py-3 br-top">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="d-flex align-items-center justify-content-start py-2">
                                <div class="d_ico">
                                    <i class="fas fa-shopping-basket"></i>
                                </div>
                                <div class="d_capt">
                                    <h5 class="mb-0">Free Shipping</h5>
                                    <span class="text-muted">Capped at $10 per order</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="d-flex align-items-center justify-content-start py-2">
                                <div class="d_ico">
                                    <i class="far fa-credit-card"></i>
                                </div>
                                <div class="d_capt">
                                    <h5 class="mb-0">Secure Payments</h5>
                                    <span class="text-muted">Up to 6 months installments</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="d-flex align-items-center justify-content-start py-2">
                                <div class="d_ico">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="d_capt">
                                    <h5 class="mb-0">15-Days Returns</h5>
                                    <span class="text-muted">Shop with fully confidence</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="d-flex align-items-center justify-content-start py-2">
                                <div class="d_ico">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="d_capt">
                                    <h5 class="mb-0">24x7 Fully Support</h5>
                                    <span class="text-muted">Get friendly support</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <br><br><br>
            <!-- ======================= Customer Features ======================== -->
            <section class="middle">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="sec_title position-relative text-center">
                                <h2 class="off_title">Les dernières publications</h2>
                                <h3 class="ft-bold pt-3">Les nouvels arrivages</h3>
                            </div>
                        </div>
                    </div>

                    <!-- row -->
                    <div class="row align-items-center rows-products">

                        <!-- Single -->
                        @foreach ($produits as $key => $produit)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                                <div class="product_grid card b-0">





                                    @if ($produit->inPromotion())
                                        <div
                                            class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">
                                            - {{ $produit->inPromotion()->pourcentage }} %</div>
                                    @endif
                                    @if (Auth()->user())
                                    <button   onclick="AddFavoris({{ $produit->id }})" class="snackbar-wishlist btn btn_love position-absolute ab-right"><i
                                            class="far fa-heart"></i></button>
                                            @endif
                                    <div class="card-body p-0">
                                        <div class="shop_thumb position-relative">
                                            <a class="card-img-top d-block overflow-hidden"  href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}"><img
                                                    class="card-img-top"  src="{{ Storage::url($produit->photo) }}"
                                                    alt="...">
                                                   
                                                </a>
                                            <div
                                                class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                <div class="edlio"><a href="#" data-toggle="modal"
                                                        data-target="#{{ $produit->id }}" class="text-white fs-sm ft-medium"><i
                                                            class="fas fa-eye mr-1"></i>Voir détails</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="card-footer b-0 p-3 pb-0 bg-white d-flex align-items-start justify-content-center">
                                        <div class="text-left">
                                            <div class="text-center">
                                                <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a
                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a></h5>
                                                <div class="elis_rty"><span class="ft-bold fs-md text-dark">@if ($produit->inPromotion())
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
                                                @endif</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Single / End -->



                    </div>
                    <!-- row -->

                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="position-relative text-center">
                                <a href="{{ '/shop' }}" class="btn stretched-link borders">Voir shop<i
                                        class="lni lni-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- ======================= All Category ======================== -->

            <!-- ======================= Product List ======================== -->
            <section class="middle gray">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="sec_title position-relative text-center">
                                <h2 class="off_title">Les produits en promotion</h2>
                                <h3 class="ft-bold pt-3">Nos produits en promotion</h3>
                            </div>
                        </div>
                    </div>

                    <!-- row -->
                    <div class="row align-items-center">

                        <!-- Single -->
                        @foreach ($produits as $produit)
                        @if ($produit->inPromotion())
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="product_grid card b-0">
                                        <div
                                            class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">
                                            @if ($produit->inPromotion())
                                                <span>
                                                    -{{ $produit->inPromotion()->pourcentage }}%</span>
                                            @endif
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="shop_thumb position-relative">
                                                <a class="card-img-top d-block overflow-hidden"
                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}"><img
                                                        class="card-img-top" src="{{ Storage::url($produit->photo) }}"
                                                        alt="..."></a>

                                                <div class="product-left-hover-overlay">
                                                    <ul class="left-over-buttons">
                                                        {{-- <li><a href="javascript:void(0);"
                                                                        class="d-inline-flex circle align-items-center justify-content-center"><i
                                                                            class="fas fa-expand-arrows-alt position-absolute"></i></a>
                                                                </li> --}}
                                                        @if (Auth()->user())
                                                            <li><a {{-- href="javascript:void(0);" --}}
                                                                    onclick="AddFavoris({{ $produit->id }})"
                                                                    class="d-inline-flex circle align-items-center justify-content-center snackbar-wishlist"><i
                                                                        class="far fa-heart position-absolute"></i></a>
                                                            </li>
                                                        @endif
                                                        <li><a {{--  href="javascript:void(0);" --}}
                                                                onclick="AddToCart({{ $produit->id }})"
                                                                class="d-inline-flex circle align-items-center justify-content-center snackbar-addcart"><i
                                                                    class="fas fa-shopping-basket position-absolute"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <style>
                                                    .shop_thumb {
                                                        color: red;
                                                    }
                                                </style>
                                                @if ($produit->sur_devis == false)
                                                    <div class="rr-fea-product__thumb-text">
                                                        @if ($produit->inPromotion())
                                                            <span>
                                                                -{{ $produit->inPromotion()->pourcentage }}%</span>
                                                        @endif
                                                    </div>
                                                @endif
                                                <div
                                                    class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                    <div class="edlio"><a href="#" data-toggle="modal"
                                                            data-target="#{{ $produit->id }}"
                                                            class="text-white fs-sm ft-medium"><i
                                                                class="fas fa-eye mr-1"></i>Voir détails</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer b-0 p-0 pt-2">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="text-left">

                                                    @foreach ($produit->couleur ?? [] as $key => $value)
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio"
                                                                name="color1" id="white" checked="">
                                                            <label class="form-option-label small rounded-circle"
                                                                for="white"> <span
                                                                    class="form-option-color rounded-circle blc7"
                                                                    style="background-color: {{ $value }} ;color:{{ $value }};">

                                                                </span></label>
                                                        </div>
                                                    @endforeach


                                                    {{-- 
                                                 
                                                   
                                                </div>
                                                <div class="text-right">
                                                    {{--  <button class="btn auto btn_love snackbar-wishlist"><i
                                                    class="far fa-heart"></i></button> --}}

                                                 {{--    @if (Auth()->user())
                                                        <button type="button favoris-button-"
                                                            class="btn auto btn_love snackbar-wishlist"
                                                           
                                                            onclick="AddFavoris({{ $produit->id }})">

                                                            <i class="far fa-heart"></i>

                                                        </button>
                                                    @endif
 --}}






                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a
                                                        href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}
                                                    </a></h5>
                                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">
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

                                                    </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- Single -->





                    </div>
                    <!-- row -->

                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="position-relative text-center">
                                <a href="{{ url('/shop') }}" class="btn stretched-link borders">Voir boutique<i
                                        class="lni lni-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- ======================= Product List ======================== -->

            <!-- ======================= Blog Start ============================ -->

            <!-- ======================= Instagram Start ============================ -->
            <section class="p-0">
                <div class="container-fluid p-0">

                    <div class="row no-gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="sec_title position-relative text-center">
                                <h2 class="off_title">Instagram Gallery</h2>
                                <span class="fs-lg ft-bold theme-cl pt-3">@mahak_71</span>
                                <h3 class="ft-bold lh-1">From Instagram</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters">

                        <div class="col">
                            <div class="_insta_wrap">
                                <div class="_insta_thumb">
                                    <a href="javascript:void(0);" class="d-block"><img
                                            src="https://via.placeholder.com/500x480" class="img-fluid"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="_insta_wrap">
                                <div class="_insta_thumb">
                                    <a href="javascript:void(0);" class="d-block"><img
                                            src="https://via.placeholder.com/500x480" class="img-fluid"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="_insta_wrap">
                                <div class="_insta_thumb">
                                    <a href="javascript:void(0);" class="d-block"><img
                                            src="https://via.placeholder.com/500x480" class="img-fluid"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="_insta_wrap">
                                <div class="_insta_thumb">
                                    <a href="javascript:void(0);" class="d-block"><img
                                            src="https://via.placeholder.com/500x480" class="img-fluid"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="_insta_wrap">
                                <div class="_insta_thumb">
                                    <a href="javascript:void(0);" class="d-block"><img
                                            src="https://via.placeholder.com/500x480" class="img-fluid"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="_insta_wrap">
                                <div class="_insta_thumb">
                                    <a href="javascript:void(0);" class="d-block"><img
                                            src="https://via.placeholder.com/500x480" class="img-fluid"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="_insta_wrap">
                                <div class="_insta_thumb">
                                    <a href="javascript:void(0);" class="d-block"><img
                                            src="https://via.placeholder.com/500x480" class="img-fluid"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="_insta_wrap">
                                <div class="_insta_thumb">
                                    <a href="javascript:void(0);" class="d-block"><img
                                            src="https://via.placeholder.com/500x480" class="img-fluid"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- ======================= Instagram Start ============================ -->


            <!-- Product View Modal -->
            @if ($produits)
                @foreach ($produits as $key => $produit)
                    <div class="modal fade lg-modal" id="{{ $produit->id }}" tabindex="-1" role="dialog"
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
                                                @foreach (json_decode($produit->photos) ?? [] as $photo)
                                                    <div class="single_view_slide"> <img class="img-responsive m-auto"
                                                            src="{{ Storage::url($photo) }}" alt=""></div>
                                                @endforeach


                                            </div>
                                        </div>

                                        <div class="quick_view_capt">
                                            <div class="prd_details">

                                                <div class="prt_01 mb-1"><span
                                                        class="text-light bg-info rounded px-2 py-1">Categorie: {{ $produit->categories->nom }}</span></div>
                                                <div class="prt_02 mb-2">
                                                    <h2 class="ft-bold mb-1">{{ $produit->nom }}</h2>
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
                                                            {{--  <span
                                                            class="ft-medium text-muted line-through fs-md mr-2">
                                                            $199
                                                            </span>
                                                            <span
                                                                class="ft-bold theme-cl fs-lg mr-2">$110
                                                            </span> --}}
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
                                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium">
                                                        Couleur(s):
                                                    </p>
                                                    <div class="text-left">
                                                        @foreach ($produit->couleur ?? [] as $key => $value)
                                                            <div class="form-check form-option form-check-inline mb-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="couleur" id="couleur">
                                                                <label class="form-option-label rounded-circle"
                                                                    for="couleur">
                                                                    <span class="form-option-color rounded-circle blc7"
                                                                        style="background-color: {{ $value }} ;color:{{ $value }};">

                                                                    </span>
                                                                </label>

                                                            </div>
                                                        @endforeach




                                                    </div>
                                                </div>

                                                <div class="prt_04 mb-4">
                                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium">
                                                        Taille(s):
                                                    </p>
                                                    <div class="text-left pb-0 pt-2">
                                                        @foreach ($produit->taille as $taille)
                                                            <div
                                                                class="form-check size-option form-option form-check-inline mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="size" id="28" checked="">
                                                                <label class="form-option-label"
                                                                    for="28">{{ $taille }}</label>
                                                            </div>
                                                        @endforeach



                                                    </div>
                                                </div>

                                                <div class="prt_05 mb-4">
                                                    <div class="form-row mb-7">
                                                        <div class="col-12 col-lg-auto">
                                                            <!-- Quantity -->
                                                            <div class="quantity">
                                                                <div class="quantity__group">
                                                                    <span class="quantity-control minus"><i
                                                                            class="far fa-minus"></i></span>
                                                                    <input type="number" class="input-text qty text"
                                                                        name="quantite" value="1"
                                                                        id="qte-{{ $produit->id }}"
                                                                        autocomplete="off">
                                                                    <span class="quantity-control plus"><i
                                                                            class="far fa-plus"></i></span>
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
                                                        {{--     <span class="mr-4">Share:</span>
                                                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2"
                                                                href="#!">
                                                                <i class="fab fa-twitter position-absolute"></i>
                                                            </a>
                                                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2"
                                                                href="#!">
                                                                <i class="fab fa-facebook-f position-absolute"></i>
                                                            </a>
                                                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted"
                                                                href="#!">
                                                                <i class="fab fa-pinterest-p position-absolute"></i>
                                                            </a> --}}
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

          

            <!-- Wishlist -->
            <!-- Wishlist -->



            <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i
                    class="ti-arrow-up"></i></a>


            </div>

        </body>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            if (togglePassword && password) {
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    this.firstElementChild.classList.toggle('fa-eye-slash');
                });
            } else {
                console.error("Element with id 'togglePassword' or 'password' not found!");
            }
        });
    </script>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        // Hide login modal if register modal is shown
        $('#registerModal').on('show.bs.modal', function() {
            $('#loginModal').modal('hide');
        });

        // Hide register modal if login modal is shown
        $('#loginModal').on('show.bs.modal', function() {
            $('#registerModal').modal('hide');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#registerForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('register') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#registerModal').modal('hide');
                        alert('Inscription effectuée avec succès!');
                    },
                    error: function(response) {
                        alert('Registration failed. Please check your input and try again.');
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('login') }}",
                    method: 'POST',
                    data: $(this).serialize(),

                    success: function(response) {
                        $('#loginModal').modal('hide');
                        // alert('Login successful!');
                        // Redirect or reload the page
                        swal({
                            title: `login success`,
                            //  text: "Si vous supprimez ceci, il disparaîtra.",
                            icon: "warning",
                            buttons: false,
                            dangerMode: true,
                            timer: 2000,

                        })
                        location.reload();
                    },
                    error: function(response) {
                        alert('Login failed. Please check your input and try again.');
                    }
                });
            });
        });
    </script>

@endsection

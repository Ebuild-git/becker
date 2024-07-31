@extends('front.fixe')
@section('titre', $produit->nom)
@section('body')

@section('SEO')
    <!-- Title -->
    <title>{{ $produit->nom ?? config('app.name') }}</title>

    <meta name="author" content="hb-design.shop">
    <meta property="og:title" content="{{ $produit->nom }}">
    <meta property="og:description" content="{{ $produit->description ?? '' }}">
    <meta property="og:image" content="{{ $produit->photo }}">
    <meta property="og:type" content="product">
    <meta property="og:price:amount" content="{{ $produit->prix }} DT">
    <meta property="og:availability" content="{{ $produit->statut }}">
    <meta property="product:price:amount" content="{{ $produit->prix }} DT">
    <meta property="product:availability" content="{{ $produit->statut }}">
    <meta name="robots" content="index, follow">
@endsection


<main>



    <!-- ======================= Top Breadcrubms ======================== -->
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->

    <!-- ======================= Product Detail ======================== -->
    <section class="middle">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
                    <div class="quick_view_slide">


                        @foreach (json_decode($produit->photos) ?? [] as $photo)
                            <div class="single_view_slide"><a href="{{ Storage::url($photo) }}" data-lightbox="roadtrip"
                                    class="d-block mb-4">

                                    <img src="{{ Storage::url($photo) }}"
                                        {{-- class="img-fluid rounded" --}}class="img-responsive m-auto"  alt="" />

                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
                    <div class="prd_details pl-3">

                        <div class="prt_01 mb-1"><span class="text-light bg-info rounded px-2 py-1">Category:
                                {{ $produit->categories->nom }}</span></div>
                        <div class="prt_02 mb-3">
                            <h2 class="ft-bold mb-1">{{ $produit->nom }}</h2>
                            <div class="text-left">
                                <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                    {{-- <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="small">(412 Reviews)</span> --}}
                                </div>
                                <div class="elis_rty">
                                    {{-- <span class="ft-medium text-muted line-through fs-md mr-2">
                                            $199</span>
                                            <span class="ft-bold theme-cl fs-lg mr-2">
                                                $110
                                            </span> --}}
                                    <span class="ft-bold fs-md text-dark">
                                        @if ($produit->inPromotion())
                                            <span class=" small">
                                                {{--  - {{ $produit->inPromotion()->pourcentage }} % --}}
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
                                    </span>
                                    <br>
                                    @if ($produit->stock > 0 || $produit->sur_devis == false)
                                        <label class="badge bg-success"> Stock disponible</label>
                                    @else
                                        <label class="badge bg-danger"> Stock non disponible</label>
                                    @endif


                                    {{-- <span class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm">
                                                Out of Stock
                                            </span> --}}
                                </div>
                            </div>
                        </div>

                        <div class="prt_03 mb-4">
                            <p>{{ $produit->description }}</p>
                        </div>

                        <div class="prt_04 mb-2">
                            <p class="d-flex align-items-center mb-0 text-dark ft-medium">Couleur(s):</p>
                            <div class="text-left">
                                @foreach ($produit->couleur ?? [] as $key => $value)
                                    <div class="form-check form-option form-check-inline mb-1">
                                        <input class="form-check-input" type="radio" name="color1" id="white"
                                            checked="">
                                        <label class=" card form-option-label small rounded-circle" for="white">
                                            <span class="form-option-color rounded-circle blc7"
                                                style="background-color: {{ $value }} ;color:{{ $value }};">

                                            </span></label>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                        <div class="prt_04 mb-4">
                            <p class="d-flex align-items-center mb-0 text-dark ft-medium">Taille(s):
                            </p>
                            <div class="text-left pb-0 pt-2">
                                {{-- @foreach ($produit->taille as $index => $taille)
                                    <div class="form-check size-option form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size"
                                            id="size-{{ $index }}" value="{{ $taille }}"
                                            {{ $loop->first ? 'checked' : '' }} checked="">
                                        <label class="form-option-label"
                                            for="size-{{ $index }}">{{ $taille }}</label>
                                @endforeach --}}
                                @foreach ($produit->taille as $taille)
                                <div
                                    class="form-check size-option form-option form-check-inline mb-2">
                                    <input class="form-check-input" type="radio" 
                                        name="taille" id="taille_{{ $taille }}">
                                    <label class="form-option-label"
                                        for="28">{{ $taille }}</label>
                                </div>
                            @endforeach
                                {{--  <select wire:model="paniers.{{ $id }}.taille" wire:change="updateTaille({{ $id }}, $event.target.value)">
                                    @foreach ($tailles as $taille)
                                        <option value="{{ $taille }}" {{ $taille == $details['taille'] ? 'selected' : '' }}>{{ $taille }}</option>
                                    @endforeach
                                </select> --}}
                            </div>



                        </div>


                        <div class="prt_05 mb-4">
                            <div class="form-row mb-7">

                                <div class="col-12 col-lg-auto">
                                    <br>

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
                                    <button type="submit" onclick="AddToCart( {{ $produit->id }} )"
                                        class="btn btn-block custom-height bg-dark mb-2">
                                        <i class="lni lni-shopping-basket mr-2"></i>Ajouter au panier
                                    </button>
                                </div>
                                <div class="col-12 col-lg-auto">
                                    <!-- Wishlist -->
                                    @if (Auth()->user())
                                        <button onclick="AddFavoris({{ $produit->id }})"
                                            class="btn custom-height btn-default btn-block mb-2 text-dark"
                                            data-toggle="button">
                                            <i class="lni lni-heart mr-2"></i>Ajouter au favori
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="prt_06">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Product Detail End ======================== -->

    <!-- ======================= Product Description ======================= -->
    <section class="middle">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12">
                    <ul class="nav nav-tabs b-0 d-flex align-items-center justify-content-center simple_tab_links mb-4"
                        id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="description-tab" href="#description" data-toggle="tab"
                                role="tab" aria-controls="description" aria-selected="true">Description</a>
                        </li>

                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <!-- Description Content -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="description_info">
                                <p class="p-0 mb-2">{{ $produit->description }}</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Product Description End ==================== -->

    <!-- ======================= Similar Products Start ============================ -->
    <section class="middle pt-0">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center">
                        <h2 class="off_title">Les produits de la même catégorie</h2>
                        <h3 class="ft-bold pt-3">Produits de même catégorie</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="slide_items">

                        <!-- single Item -->
                        @php

                            $relatedProducts = $produit->categories->produits->where('id', '!=', $produit->id);

                        @endphp


                        <!-- single Item -->
                        @if ($relatedProducts)
                            @foreach ($relatedProducts as $produit)
                                <div class="single_itesm">
                                    <div class="product_grid card b-0 mb-0">
                                        @if (Auth()->user())
                                            <button onclick="AddFavoris({{ $produit->id }})"
                                                class="snackbar-wishlist btn btn_love position-absolute ab-right"><i
                                                    class="far fa-heart"></i></button>
                                        @endif
                                        <div class="card-body p-0">
                                            <div class="shop_thumb position-relative">
                                                <a class="card-img-top d-block overflow-hidden"
                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}"><img
                                                        class="card-img-top"
                                                        src="{{ Storage::url($produit->photo) }}" alt="..."></a>
                                                {{-- <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                    <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Voir détails</a></div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div
                                            class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
                                            <div class="text-left">
                                                <div class="text-center">
                                                    <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a
                                                            href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a>
                                                    </h5>
                                                    <div class="elis_rty"><span class="ft-bold fs-md text-dark">
                                                            @if ($produit->inPromotion())
                                                                <span class=" small">
                                                                    - {{ $produit->inPromotion()->pourcentage }} %
                                                                </span>
                                                                <b class="ft-bold theme-cl fs-lg mr-2">
                                                                    {{ $produit->getPrice() }} DT
                                                                </b>
                                                                <br>
                                                                <strike>
                                                                    <span
                                                                        class="ft-medium text-muted line-through fs-md mr-2">
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
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">Aucun produit de la même catégorie.


                            </div>

                        @endif





                    </div>
                </div>
            </div>

        </div>

        <!-----modal------>

    </section>




</main>
@endsection

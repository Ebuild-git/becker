@extends('front.fixe')
@section('titre', 'Shop')
@section('body')



    <!-- Body main wrapper start -->
    <main>

        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="section-title text-center mb-45">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>



            <!--prodact-area-->
            <section class="prodact-area product-bg">
                <div
                    class="rr-fea-product__area sub-inner-area p-relative fix grey-bg-2 pb-120 pt-115 rr-pro-tab1 rr-el-section">
                    <div class="container custom-container-3">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="rr-fea-product__tab mb-35">
                                    <nav>
                                        <div class="nav nav-tab nav-inner align-items-center justify-content-between"
                                            id="nav-tab" role="tablist">
                                            <div class="text">

                                            </div>
                                            <div class="all-button d-flex">
                                                <button class="nav-link rr-el-rep-filterBtn" id="nav-0-tab"
                                                    data-bs-toggle="tab" data-bs-target="#nav-0" type="button"
                                                    role="tab" aria-controls="nav-0" aria-selected="true"><svg
                                                        width="19" height="19" viewBox="0 0 19 19" fill="#001D08"
                                                        fill-opacity="0.1" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="4" cy="4" r="4" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="4" cy="15" r="4" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="15" cy="4" r="4" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="15" cy="15" r="4" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                    </svg>
                                                </button>
                                                <button class="nav-link rr-el-rep-filterBtn " id="nav-1-tab"
                                                    data-bs-toggle="tab" data-bs-target="#nav-1" type="button"
                                                    role="tab" aria-controls="nav-1" aria-selected="false"><svg
                                                        width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="2.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="2.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                    </svg>
                                                </button>
                                                <button class="nav-link rr-el-rep-filterBtn active" id="nav-2-tab"
                                                    data-bs-toggle="tab" data-bs-target="#nav-2" type="button"
                                                    role="tab" aria-controls="nav-2" aria-selected="false"><svg
                                                        width="26" height="19" viewBox="0 0 26 19" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="2.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="2.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="23.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="23.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="23.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                    </svg>
                                                </button>
                                                <button class="nav-link rr-el-rep-filterBtn " id="nav-3-tab"
                                                    data-bs-toggle="tab" data-bs-target="#nav-3" type="button"
                                                    role="tab" aria-controls="nav-2" aria-selected="false"><svg
                                                        width="33" height="19" viewBox="0 0 33 19" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="2.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="2.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="23.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="30.5" cy="2.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="9.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="23.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="30.5" cy="9.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="16.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="23.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                        <circle cx="30.5" cy="16.5" r="2.5" fill="#001D08"
                                                            fill-opacity="0.1" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="right-text mt-md-30 mt-xs-30">
                                                <div class="nice-select-select sorting-type">
                                                    <span>Afficher par : </span>
                                                    <select class="lan-5" name="sort_by" id="sort_by"
                                                        onchange="window.location.href=this.value;">
                                                        <option value="{{ url('shop') }}">Default</option>
                                                        <option value="{{ url('croissant') }}">Croissant</option>

                                                        <option value="{{ url('decroissant') }}">Décroissant</option>



                                                    </select>
                                               
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-0" role="tabpanel" aria-labelledby="nav-0-tab"
                                    tabindex="0">
                                    <div class="rr-fea-product__wrapper wrapper">
                                        <div class="row">
                                            <style>
                                                .rr-fea-product__thumb-text span {
                                                    color: red;
                                                }
                                            </style>


                                            @forelse ($produits as $key => $produit)
                                                <div class="col-xl-6 col-lg-4 col-md-3">
                                                    <div class="rr-fea-product__item item rr-pro-img">

                                                        <div class="rr-fea-product__thumb fix p-relative">
                                                            <a
                                                                href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                                                <img src="{{ Storage::url($produit->photo) }}"
                                                                    style=" width: 510px;height: 400px; border-radius:8px"
                                                                    alt="Product image" />
                                                            </a>

                                                            <div class="rr-fea-product__thumb-text">
                                                                <span>
                                                                    @if ($produit->sur_devis == false)
                                                                        <div class="rr-fea-product__thumb-text ">
                                                                            @if ($produit->inPromotion())
                                                                                <span>
                                                                                    -{{ $produit->inPromotion()->pourcentage }}%</span>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                </span>
                                                            </div>




                                                            <div class="rr-fea-product__icon-box rr-product-action">
                                                                <div class="product-action-btn mb-6">

                                                                    @if (Auth()->user())
                                                                        <button type="button"
                                                                            class="icon-btn woosq-btn woosq-btn-896 "
                                                                            data-id="896" data-effect="mfp-3d-unfold"
                                                                            onclick="AddFavoris({{ $produit->id }})">

                                                                            <svg width="20" height="18"
                                                                                viewBox="0 0 20 18" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M17.612 2.41452C17.1722 1.96607 16.65 1.61034 16.0752 1.36763C15.5005 1.12492 14.8844 1 14.2623 1C13.6401 1 13.0241 1.12492 12.4493 1.36763C11.8746 1.61034 11.3524 1.96607 10.9126 2.41452L9.99977 3.34476L9.08699 2.41452C8.19858 1.50912 6.99364 1.00047 5.73725 1.00047C4.48085 1.00047 3.27591 1.50912 2.38751 2.41452C1.4991 3.31992 1 4.5479 1 5.82833C1 7.10875 1.4991 8.33674 2.38751 9.24214L3.30029 10.1724L9.99977 17L16.6992 10.1724L17.612 9.24214C18.0521 8.79391 18.4011 8.26171 18.6393 7.67596C18.8774 7.0902 19 6.46237 19 5.82833C19 5.19428 18.8774 4.56645 18.6393 3.9807C18.4011 3.39494 18.0521 2.86275 17.612 2.41452Z"
                                                                                    stroke="#001D08" stroke-width="1.5"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>


                                                                        </button>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        
                                                        </div>

                                                        <div class="rr-fea-product__content">
                                                            <div class="rr-fea-product__star">
                                                           
                                                            </div>
                                                            <h4 class="rr-fea-product__title-sm"><a
                                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a>
                                                            </h4>
                                                            <div class="rr-product-content-price">
                                                                <span class="product-item-3-price">
                                                                    <span class="price">
                                                                        <span class="woocs_price_code d-flex gap-6">
                                                                            @if ($produit->inPromotion() && $produit->sur_devis == false)
                                                                                <span class="product-item-3-price">
                                                                                    <span class="price">

                                                                                        <span
                                                                                            class="woocs_price_code d-flex gap-6">
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-sm-6 text-left">
                                                                                                    <del
                                                                                                        aria-hidden="true">

                                                                                                        <span
                                                                                                            class="woocommerce-price-amount amount">
                                                                                                            {{ $produit->prix }}
                                                                                                            DT

                                                                                                        </span>
                                                                                                    </del>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-sm-0 text-center">
                                                                                                </div>

                                                                                                <div
                                                                                                    class="col-sm-6 text-right">
                                                                                                    <span
                                                                                                        class="woocommerce-price-amount amount body-color">
                                                                                                        {{ $produit->getPrice() }}
                                                                                                        DT

                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            @elseif ($produit->sur_devis == false)
                                                                                {{ $produit->getPrice() }}DT
                                                                            @endif

                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="rr-fea-product__link-box">

                                                                @if ($produit->sur_devis == false)
                                                                    <button type="button"
                                                                        class="cart-button icon-btn button rr-btn-cart "
                                                                        onclick="AddToCart( {{ $produit->id }} )">

                                                                        <span></span>Ajouter au panier
                                                                    </button>
                                                                @else
                                                                    <a href="{{ url('devis', $produit->id) }}"
                                                                        class="cart-button icon-btn button rr-btn-cart ">
                                                                        <span></span>Demmander un devis
                                                                    </a>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p class="text-center">Aucun produit disponible.</p>
                                            @endforelse


                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab"
                                    tabindex="0">
                                    <div class="rr-fea-product__wrapper">
                                        <div class="row">
                                            @if ($produits)
                                                @forelse ($produits as $key => $produit)
                                                    <div class="col-xl-4 col-lg-6 col-md-3">
                                                        <div class="rr-fea-product__item rr-pro-img">

                                                            <div class="rr-fea-product__thumb fix p-relative">
                                                                <a
                                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                                                    <img src="{{ Storage::url($produit->photo) }}"
                                                                        style=" width: 320px;height: 200px; border-radius:8px"
                                                                        alt="Product image" />
                                                                </a>
                                                                <div class="rr-fea-product__thumb-text">
                                                                    <span>
                                                                        @if ($produit->sur_devis == false)
                                                                            <div class="rr-fea-product__thumb-text">
                                                                                @if ($produit->inPromotion())
                                                                                    <span>
                                                                                        -{{ $produit->inPromotion()->pourcentage }}%</span>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </span>
                                                                </div>

                                                                <div
                                                                    class="rr-fea-product__icon-box icon-box-2 rr-product-action">
                                                                    <div class="product-action-btn mb-6">
                                                                        @if (Auth()->user())
                                                                            <button type="button"
                                                                                class="icon-btn woosq-btn woosq-btn-896 "
                                                                                data-id="896" data-effect="mfp-3d-unfold"
                                                                                onclick="AddFavoris({{ $produit->id }})">

                                                                                <svg width="20" height="18"
                                                                                    viewBox="0 0 20 18" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M17.612 2.41452C17.1722 1.96607 16.65 1.61034 16.0752 1.36763C15.5005 1.12492 14.8844 1 14.2623 1C13.6401 1 13.0241 1.12492 12.4493 1.36763C11.8746 1.61034 11.3524 1.96607 10.9126 2.41452L9.99977 3.34476L9.08699 2.41452C8.19858 1.50912 6.99364 1.00047 5.73725 1.00047C4.48085 1.00047 3.27591 1.50912 2.38751 2.41452C1.4991 3.31992 1 4.5479 1 5.82833C1 7.10875 1.4991 8.33674 2.38751 9.24214L3.30029 10.1724L9.99977 17L16.6992 10.1724L17.612 9.24214C18.0521 8.79391 18.4011 8.26171 18.6393 7.67596C18.8774 7.0902 19 6.46237 19 5.82833C19 5.19428 18.8774 4.56645 18.6393 3.9807C18.4011 3.39494 18.0521 2.86275 17.612 2.41452Z"
                                                                                        stroke="#001D08"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>


                                                                            </button>
                                                                        @endif
                                                                    </div>

                                                           
                                                                </div>
                                                                <div class="product-action-btn-5">
                                                              
                                                                </div>
                                                            </div>

                                                            <div class="rr-fea-product__content">
                                                                <div class="rr-fea-product__star">
                                                                 
                                                                </div>
                                                                <h4 class="rr-fea-product__title-sm"><a
                                                                        href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}
                                                                    </a></h4>
                                                                <div class="rr-product-content-price">
                                                                    <span class="product-item-3-price">
                                                                        <span class="price">
                                                                            <span class="woocs_price_code d-flex gap-6">
                                                                                @if ($produit->inPromotion() && $produit->sur_devis == false)
                                                                                    <span class="product-item-3-price">
                                                                                        <span class="price">

                                                                                            <span
                                                                                                class="woocs_price_code d-flex gap-6">
                                                                                                <div class="row">
                                                                                                    <div
                                                                                                        class="col text-left">
                                                                                                        <del
                                                                                                            aria-hidden="true">

                                                                                                            <span
                                                                                                                class="woocommerce-price-amount amount">
                                                                                                                {{ $produit->prix }}
                                                                                                                DT

                                                                                                            </span>
                                                                                                        </del>
                                                                                                    </div>

                                                                                                    <div
                                                                                                        class="col text-left">
                                                                                                        <span
                                                                                                            class="woocommerce-price-amount amount body-color">
                                                                                                            {{ $produit->getPrice() }}
                                                                                                            DT

                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                @elseif ($produit->sur_devis == false)
                                                                                    {{ $produit->getPrice() }}DT
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="rr-fea-product__link-box">
                                                                
                                                                    @if ($produit->sur_devis == false)
                                                                        <button type="button"
                                                                            class="cart-button icon-btn button rr-btn-cart "
                                                                            onclick="AddToCart( {{ $produit->id }} )">

                                                                            <span></span>Ajouter au panier
                                                                        </button>
                                                                    @else
                                                                        <a href="{{ url('devis', $produit->id) }}"
                                                                            class="cart-button icon-btn button rr-btn-cart ">
                                                                            <span></span>Demmander un devis
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="nav-2" role="tabpanel"
                                    aria-labelledby="nav-2-tab" tabindex="0">
                                    <div class="rr-fea-product__wrapper">
                                        <div class="row">
                                            @if ($produits)
                                                @forelse ($produits as $key => $produit)
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                        <div class="rr-fea-product__item rr-pro-img">

                                                            <div class="rr-fea-product__thumb fix p-relative">
                                                                <a
                                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                                                    <img src="{{ Storage::url($produit->photo) }}"
                                                                        style=" width: 210px;height: 100px; border-radius:8px"
                                                                        alt="Product image" />
                                                                </a>
                                                                <div class="rr-fea-product__thumb-text">
                                                                    <span>
                                                                        @if ($produit->sur_devis == false)
                                                                            <div class="rr-fea-product__thumb-text">
                                                                                @if ($produit->inPromotion())
                                                                                    <span>
                                                                                        -{{ $produit->inPromotion()->pourcentage }}%</span>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </span>
                                                                </div>

                                                                <div
                                                                    class="rr-fea-product__icon-box icon-box-3 rr-product-action">
                                                                    <div class="product-action-btn mb-6">
                                                                        @if (Auth()->user())
                                                                            <button type="button"
                                                                                class="icon-btn woosq-btn woosq-btn-896 "
                                                                                data-id="896" data-effect="mfp-3d-unfold"
                                                                                onclick="AddFavoris({{ $produit->id }})">

                                                                                <svg width="20" height="18"
                                                                                    viewBox="0 0 20 18" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M17.612 2.41452C17.1722 1.96607 16.65 1.61034 16.0752 1.36763C15.5005 1.12492 14.8844 1 14.2623 1C13.6401 1 13.0241 1.12492 12.4493 1.36763C11.8746 1.61034 11.3524 1.96607 10.9126 2.41452L9.99977 3.34476L9.08699 2.41452C8.19858 1.50912 6.99364 1.00047 5.73725 1.00047C4.48085 1.00047 3.27591 1.50912 2.38751 2.41452C1.4991 3.31992 1 4.5479 1 5.82833C1 7.10875 1.4991 8.33674 2.38751 9.24214L3.30029 10.1724L9.99977 17L16.6992 10.1724L17.612 9.24214C18.0521 8.79391 18.4011 8.26171 18.6393 7.67596C18.8774 7.0902 19 6.46237 19 5.82833C19 5.19428 18.8774 4.56645 18.6393 3.9807C18.4011 3.39494 18.0521 2.86275 17.612 2.41452Z"
                                                                                        stroke="#001D08"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>


                                                                            </button>
                                                                        @endif
                                                                    </div>


                                                                </div>
                                                                <div class="product-action-btn-5">
                                                                    {{--   <h5>Hot</h5> --}}
                                                                </div>
                                                            </div>

                                                            <div class="rr-fea-product__content">
                                                                <div class="rr-fea-product__star">

                                                                </div>
                                                                <h4 class="rr-fea-product__title-sm"><a
                                                                        href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a>
                                                                </h4>
                                                                <div class="rr-product-content-price">
                                                                    <span class="product-item-3-price">
                                                                        <span class="price">
                                                                            <span class="woocs_price_code d-flex gap-6">
                                                                                @if ($produit->inPromotion() && $produit->sur_devis == false)
                                                                                    <span class="product-item-3-price">
                                                                                        <span class="price">

                                                                                            <span
                                                                                                class="woocs_price_code d-flex gap-6">
                                                                                                <div class="row">
                                                                                                    <div class="col-6">
                                                                                                        <del
                                                                                                            aria-hidden="true">

                                                                                                            <span
                                                                                                                class="woocommerce-price-amount amount">
                                                                                                                {{ $produit->prix }}
                                                                                                                DT

                                                                                                            </span>
                                                                                                        </del>
                                                                                                    </div>
                                                                                                    <div class="col">

                                                                                                    </div>

                                                                                                    <div class="col-6">
                                                                                                        <span
                                                                                                            class="woocommerce-price-amount amount body-color">
                                                                                                            {{ $produit->getPrice() }}
                                                                                                            DT

                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                @elseif ($produit->sur_devis == false)
                                                                                    {{ $produit->getPrice() }}DT
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="rr-fea-product__link-box">
                                                                    @if ($produit->sur_devis == false)
                                                                        <button type="button"
                                                                            class="cart-button icon-btn button rr-btn-cart "
                                                                            onclick="AddToCart( {{ $produit->id }} )">

                                                                            <span></span>Ajouter au panier
                                                                        </button>
                                                                    @else
                                                                        <a href="{{ url('devis', $produit->id) }}"
                                                                            class="cart-button icon-btn button rr-btn-cart ">
                                                                            <span></span>Demmander un devis
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                
                                <div class="tab-pane fade " id="nav-3" role="tabpanel" aria-labelledby="nav-2-tab"
                                    tabindex="0">
                                    <div class="rr-fea-product__wrapper">
                                        <div class="row">

                                            @forelse ($produits as $key => $produit)
                                                @if ($produits)
                                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                        <div class="rr-fea-product__item rr-pro-img">

                                                            <div class="rr-fea-product__thumb fix p-relative">
                                                                <a
                                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 5))]) }}">
                                                                    <img src="{{ Storage::url($produit->photo) }}"
                                                                        style=" width: 110px;height: 100px; border-radius:8px"
                                                                        alt="Product image" />
                                                                </a>
                                                                <div class="rr-fea-product__thumb-text">
                                                                    <span>
                                                                        @if ($produit->sur_devis == false)
                                                                            <div class="rr-fea-product__thumb-text">
                                                                                @if ($produit->inPromotion())
                                                                                    <span>
                                                                                        -{{ $produit->inPromotion()->pourcentage }}%</span>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </span>
                                                                </div>

                                                                <div
                                                                    class="rr-fea-product__icon-box icon-box-4 rr-product-action">
                                                                    <div class="product-action-btn mb-6">
                                                                        @if (Auth()->user())
                                                                            <button type="button"
                                                                                class="icon-btn woosq-btn woosq-btn-896 "
                                                                                data-id="896" data-effect="mfp-3d-unfold"
                                                                                onclick="AddFavoris({{ $produit->id }})">

                                                                                <svg width="20" height="18"
                                                                                    viewBox="0 0 20 18" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M17.612 2.41452C17.1722 1.96607 16.65 1.61034 16.0752 1.36763C15.5005 1.12492 14.8844 1 14.2623 1C13.6401 1 13.0241 1.12492 12.4493 1.36763C11.8746 1.61034 11.3524 1.96607 10.9126 2.41452L9.99977 3.34476L9.08699 2.41452C8.19858 1.50912 6.99364 1.00047 5.73725 1.00047C4.48085 1.00047 3.27591 1.50912 2.38751 2.41452C1.4991 3.31992 1 4.5479 1 5.82833C1 7.10875 1.4991 8.33674 2.38751 9.24214L3.30029 10.1724L9.99977 17L16.6992 10.1724L17.612 9.24214C18.0521 8.79391 18.4011 8.26171 18.6393 7.67596C18.8774 7.0902 19 6.46237 19 5.82833C19 5.19428 18.8774 4.56645 18.6393 3.9807C18.4011 3.39494 18.0521 2.86275 17.612 2.41452Z"
                                                                                        stroke="#001D08"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>


                                                                            </button>
                                                                        @endif
                                                                    </div>

                                                               
                                                                </div>
                                                                <div class="product-action-btn-5">
                                                                    {{--  <h5>Hot</h5> --}}
                                                                </div>
                                                            </div>

                                                            <div class="rr-fea-product__content">
                                                                <div class="rr-fea-product__star">
                                                              
                                                                </div>
                                                                <h4 class="rr-fea-product__title-sm"><a
                                                                        href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a>
                                                                </h4>
                                                                <div class="rr-product-content-price">
                                                                    <span class="product-item-3-price">
                                                                        <span class="price">
                                                                            <span class="woocs_price_code d-flex gap-6">
                                                                                @if ($produit->inPromotion() && $produit->sur_devis == false)
                                                                                    <span class="product-item-3-price">
                                                                                        <span class="price">

                                                                                            <span
                                                                                                class="woocs_price_code d-flex gap-6">
                                                                                                <div class="row">
                                                                                                    <div class="col-6"
                                                                                                        style=" font-size: 12px">
                                                                                                        <del
                                                                                                            aria-hidden="true">

                                                                                                            <span
                                                                                                                class="woocommerce-price-amount amount">
                                                                                                                {{ $produit->prix }}
                                                                                                                DT

                                                                                                            </span>
                                                                                                        </del>
                                                                                                    </div>
                                                                                                    <div class="col">

                                                                                                    </div>

                                                                                                    <div class="col-6">
                                                                                                        <span
                                                                                                            class="woocommerce-price-amount amount body-color"
                                                                                                            style=" font-size: 10px; text-align: left;">
                                                                                                            {{ $produit->getPrice() }}
                                                                                                            DT

                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                @elseif ($produit->sur_devis == false)
                                                                                    {{ $produit->getPrice() }}DT
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="rr-fea-product__link-box">
                                                                    @if ($produit->sur_devis == false)
                                                                        <button type="button"
                                                                            class="cart-button icon-btn button rr-btn-cart "
                                                                            onclick="AddToCart( {{ $produit->id }} )">

                                                                            <span></span>Ajouter au panier
                                                                        </button>
                                                                    @else
                                                                        <a href="{{ url('devis', $produit->id) }}"
                                                                            class="cart-button icon-btn button rr-btn-cart ">
                                                                            <span></span>Demmander un devis
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                            @endforeach



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-button d-flex justify-content-between">
                    
                        </div>
                    </div>
                </div>



            </section>
    </main>




@endsection

@extends('front.fixe')
@section('titre', 'Paiement')
@section('body')
    <main>

        <div class="breadcrumb__area breadcrumb-space overflow-hidden banner-home-bg ">
            <div class="banner-home__middel-shape inner-top-shape"></div>
            <div class="container">
                <div class="banner-all-shape-wrapper">
                    <div class="banner-home__banner-shape-1 first-shape">
                        <img class="upDown-top" src="assets/imgs/banner-1/banner-shape-1.svg" alt="img not found">
                    </div>
                    <div class="banner-home__banner-shape-2 second-shape">
                        <img class="upDown-bottom" src="assets/imgs/banner-1/banner-shape-2.svg" alt="img not found">
                    </div>
                    <div class="right-shape">
                        <img class="zooming" src="assets/imgs/inner-img/inner-right-shape.svg" alt="img not found">
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-12">
                        <div class="breadcrumb__content text-center">
                            <div class="breadcrumb__title-wrapper mb-15 mb-sm-10 mb-xs-5">
                                <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">
                                    Confirmation commande</h1>
                            </div>
                            <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ route('home') }}">Accueil</a></span></li>
                                        <li class="active"><span>Commande</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- coupon-area start -->
        <section class="coupon-area pt-100 pb-30">
            <div class="container container-small">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </section>
        <!-- coupon-area end -->
        <br>
        <br>
        <!-- checkout-area start -->
        <section class="checkout-area pb-70">
            <div class="container container-small">
                <form action="{{ route('order.confirm') }}" method="post">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3 class="mb-10">Détails de la facturation</h3>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Nom <span class="required">*</span></label>
                                            <input type="text" name="nom"
                                                @if (Auth::user()) value="{{ Auth::user()->nom }}" @endif
                                                required />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Prénom <span class="required">*</span></label>
                                            <input type="text" name="prenom"
                                                @if (Auth::user()) value="{{ Auth::user()->prenom }}" @endif
                                                required />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="text" name="email"
                                                @if (Auth::user()) value="{{ Auth::user()->email }}" @endif
                                                required />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Addresse <span class="required">*</span></label>
                                            <input type="text" name="adresse" placeholder="Votre addresse" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Téléphone <span class="required">*</span></label>
                                            <input class="form-control" type="text" name="phone"
                                                placeholder=" votre numéro  téléphone" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <style>
                                                .form-control-ps {
                                                    display: block !important;
                                                    padding: 25px;
                                                    height: 15;

                                                }
                                            </style>
                                            <label>Gouvernorat <span class="required">*</span></label>
                                            <select class="form-control form-control-ps  p-4 w-100" name="gouvernorat"
                                                style="font-size: 17px; font-weight: bold;">
                                                <option value="">Gouvernorat</option>
                                                @foreach ($gouvernorats as $gouvernorat)
                                                    <option value="{{ $gouvernorat }}">
                                                        {{ $gouvernorat }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>





                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order mb-30 ">
                                <h3>Votre commande</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paniers as $id => $details)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $details['nom'] }} <strong class="product-quantity"> ×
                                                            {{ $details['quantite'] }}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{ $details['total'] }} DT</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th> Subtotal</th>
                                                <td><span class="amount">{{ $total }} DT</span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Frais transport</th>
                                                <td>
                                                    <ul>
                                                        <li>

                                                            <label>
                                                                <span class="amount">{{ $configs->frais ?? 0 }} DT</span>
                                                            </label>
                                                        </li>

                                                        <li></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                          {{--   <tr class="shipping">
                                                <th>TVA à {{ $configs->tax ?? 0 }}%</th>
                                                <td>
                                                    <ul>
                                                        <li>

                                                            <label>
                                                                <span class="amount">{{number_format( $total*($configs->tax ?? 0)/100 ,2, ',',' ')  }} DT</span>
                                                            </label>
                                                        </li>

                                                        <li></li>
                                                    </ul>
                                                </td>
                                            </tr> --}}
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td><strong><span class="amount">{{ $total  + $configs->frais ?? 0 }}
                                                            DT</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">
                                    <div class="accordion" id="checkoutAccordion">




                                    </div>
                                    <div class="order-button-payment mt-20">

                                        <button class="rr-btn">Confirmation
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>



    </main>
    <style>
        .nice-select {
            display: none !important;
        }
    </style>
@endsection
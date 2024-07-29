@extends('front.fixe')
@section('titre', 'Mes commandes ')
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
                                <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">Mes
                                    commandes</h1>
                            </div>
                            <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ route('home') }}">Accueil</a></span></li>
                                        <li class="active"><span>Commandes</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="cart-area pt-120 pb-120">
            <div class="container container-small">
                <div class="row">
                    <div class="col-12">
                        <div class="table-content">
                            <table class="table">
                                <thead style=" background-color: #380aee22;">
                                    <tr>
                                       
                                        <th class="cart-product-name">Article</th>
                                        <th class="product-price"> Montant</th>
                                        <th class="product-quantity">Frais transport</th>
                                        <th class="product-price"> Date commande</th>
                                        <th class="product-price"> Status</th>
                                        <th class="product-subtotal">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($commandes as $key => $commande)
                                    <tr>
                                        <td>
                                           
                                            {{ $commande->contenus->count() }}
                                        </td>
                                        <td >
                                            {{-- {{ $commande->montant() }} DT --}}
                                            @if ($commande->frais && $commande->tax)
                                            <b>{{ $commande->montantHT() + $commande->frais }} DT</b>
                                        @elseif($commande->frais)
                                            <b>{{ $commande->montant()}} DT</b>
                                        @elseif($commande->tax)
                                            <b>{{ $commande->montantHT() }} DT</b>
                                        @else
                                            <b>{{ $commande->montant() - $commande->frais }} DT</b>
                                        @endif
                                        </td>
                                        <td>
                                            {{ $commande->frais ?? 0}} DT
                                        </td>
                                        <td>
                                            {{ $commande->created_at }}
                                           
                                        </td>
                                        <td>
                                            
                                            {{ $commande->statut }}
                                        </td>
                                        <td>
                                            <a href="{{ route('print_commande',['id'=> $commande->id ]) }}" class="btn btn-sm btn-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width=" 26" height="26" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                                                  </svg>
                                                Facture
                                            </a>
                                        </td>
                                       
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6 ">

                                                <div class="text-center p-5"><img  style="  width: 100px;
        height: 100px;"
                                                        src="https://img.icons8.com/?size=100&id=15867&format=png&color=000000"
                                                        alt="shopping-cart--v1" />
                                                    <br>
                                                    <h5>
                                                        Aucune commande enregistrée pour l'instant.
                                                    </h5>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </section>

    </main>

@endsection

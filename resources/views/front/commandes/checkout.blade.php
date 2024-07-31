@extends('front.fixe')
@section('titre', 'Paiement')
@section('body')
    <main>

        <div class="gray py-3">
            <div class="container">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                             
                                <li class="breadcrumb-item active" aria-current="page">Confirmation commande</li>
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
            
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="text-center d-block mb-5">
                            <h2>Confirmation commande</h2>
                        </div>
                    </div>
                </div>
                <form action="{{ route('order.confirm') }}" method="post">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif
                    @csrf
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-7 col-md-12">
                       {{--  <form action="{{ route('order.confirm') }}" method="post">
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif
                            @csrf --}}
                            <h5 class="mb-4 ft-medium">Détails facture</h5>
                            <div class="row mb-2">
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Nom *</label>
                                        <input type="text" name="nom" class="form-control"  @if (Auth::user()) value="{{ Auth::user()->nom }}" @endif
                                        required  placeholder="Votre nom" />
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Prénom *</label>
                                        <input type="text" name="prenom" class="form-control" placeholder="Votre prénom" name="prenom"
                                        @if (Auth::user()) value="{{ Auth::user()->prenom }}" @endif
                                        required />
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Email *</label>
                                        <input type="email" class="form-control" placeholder="Email"name="email"
                                        @if (Auth::user()) value="{{ Auth::user()->email }}" @endif
                                        required  />
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Téléphone</label>
                                        <input type="number" name="phone"  class="form-control" placeholder="Votre téléphone" required/>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Addresse</label>
                                        <input type="text" class="form-control" name="adresse"  placeholder="Addresse" required/>
                                    </div>
                                </div>
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Gouvernorat</label>
                                        <select class="custom-select">
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
                            
                         
                            
                            <div class="row mb-4">
                                <div class="col-12 col-lg-12 col-xl-12 col-md-12">
                                    <div class="panel-group pay_opy980" id="payaccordion">
                                
                                    
                                    </div>
                                </div>
                            </div>
                            
                       {{--  </form> --}}
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-12 col-lg-4 col-md-12">
                        <div class="d-block mb-3">
                            <h5 class="mb-4">Order Items (  {{ count($paniers) }} )</h5>
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                                
                                @foreach ($paniers as $id => $details)
                                
                                <li class="list-group-item">
                                  
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <!-- Image -->
                                            <a href="{{ route('details-produits', ['id' => $details['id_produit'], 'slug'=>Str::slug(Str::limit($details['nom'], 10))]) , }}"><img src="{{ Storage::url($details['photo']) }}" alt="..." class="img-fluid"></a>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <div class="cart_single_caption pl-2">
                                                <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{ $details['nom'] }}</h4>
                                                <p class="mb-1 lh-1"><span class="text-dark">Qté:  {{ $details['quantite'] }}</span></p>
                                                {{-- <p class="mb-1 lh-1"><span class="text-dark">Taille:  {{ $details['taille'] }}</span></p>  --}}
                                                
                                                
                                                <h4 class="fs-md ft-medium mb-3 lh-1">{{ $details['total'] }} DT</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        
                        <div class="card mb-4 gray">
                          <div class="card-body">
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                              <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Subtotal</span> <span class="ml-auto text-dark ft-medium">{{ $total }} DT</span>
                              </li>
                              <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Frais transport</span> <span class="ml-auto text-dark ft-medium">{{ $configs->frais ?? 0 }} DT</span>
                              </li>
                              <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Total</span> <span class="ml-auto text-dark ft-medium">{{ $total  + $configs->frais ?? 0 }} DT</span>
                              </li>
                              <li class="list-group-item fs-sm text-center">
                                Frais d'expédition calculés à la caisse *
                              </li>
                            </ul>
                          </div>
                        </div>
                        
                       {{--  <a class="btn btn-block btn-dark mb-3" href="checkout.html">Place Your Order</a> --}}
                        <button class="btn btn-block btn-dark mb-3">Confirmation
                        </button>
                    </div>
                    
                </div>
                </form>
                
            </div>
        </section>
        <!-- ======================= Product Detail End ======================== -->
        </section>

<!-- ============================= Customer Features =============================== -->


    </main>
    <style>
        .nice-select {
            display: none !important;
        }
    </style>
@endsection

@extends('front.fixe')
@section('titre', 'Mes commandes ')
@section('body')

<main>
   
              
                <!-- ======================= Top Breadcrubms ======================== -->
                <div class="gray py-3">
                    <div class="container">
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Mon compte</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ======================= Top Breadcrubms ======================== -->
                
                <!-- ======================= Dashboard Detail ======================== -->
                <section class="middle">
                    <div class="container">
                        <div class="row align-items-start justify-content-between">
                        
                           @include('front.comptes.sidebar')
                            

                           <div class="col-12 col-md-12 col-lg-8 col-xl-8 text-center">
						
                            @foreach ($commandes as $commande )
							<!-- Single Order List -->
							<div class="ord_list_wrap border mb-4 mfliud">
								<div class="ord_list_head gray d-flex align-items-center justify-content-between px-3 py-3">
									<div class="olh_flex">
										<p class="m-0 p-0"><span class="text-muted">Numéro de commande</span></p>
										<h6 class="mb-0 ft-medium">#{{ $commande->id }}</h6>
									</div>	
									<div class="olh_flex">
										<a href="{{ route('print_commande',['id'=> $commande->id ]) }}" class="btn btn-sm btn-dark">Facture</a>
									</div>	
								</div>
								<div class="ord_list_body text-left">
									<!-- First Product -->
                                    @foreach ($commande->contenus as $produit)
                                    <div class="row align-items-center justify-content-center m-0 py-4 br-bottom">
										<div class="col-xl-5 col-lg-5 col-md-5 col-12">
											<div class="cart_single d-flex align-items-start mfliud-bot">
												<div class="cart_selected_single_thumb">
													<a href="#"><img src="{{ Storage::url($produit->produit->photo) ?? ' '}}" width="75" class="img-fluid rounded" alt=""></a>
												</div>
												<div class="cart_single_caption pl-3">
													<p class="mb-0"><span class="text-muted small">Categorie: {{ $produit->produit->categories->nom ?? ' ' }}</span></p>
													<h4 class="product_title fs-sm ft-medium mb-1 lh-1">{{ $produit->produit->nom ?? ' '}}</h4>
													<p class="mb-2"><span class="text-dark medium">Qté:{{ $commande->contenus->count()  }}
													<h4 class="fs-sm ft-bold mb-0 lh-1">{{ $produit->produit->prix }}</h4>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-lg-3 col-md-3 col-6">
											<p class="mb-1 p-0"><span class="text-muted">Status</span></p>
											<div class="delv_status"><span class="ft-medium small text-warning bg-light-warning rounded px-3 py-1">{{ $commande->statut ?? ' '}}</span></div>
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-6">
											<p class="mb-1 p-0"><span class="text-muted">Date commande:</span></p>
											<h6 class="mb-0 ft-medium fs-sm"> {{ $commande->created_at ?? ' '}}</h6>
										</div>
									</div>
                                    @endforeach
									
									
								
								
									
								</div>
								<div class="ord_list_footer d-flex align-items-center justify-content-between br-top px-3">
									<div class="col-xl-3 col-lg-3 col-md-4 olf_flex text-left px-0 py-2 br-right"><a href="javascript:void(0);" class="ft-medium fs-sm"><i class="ti-close mr-2"></i>Cancel Order</a></div>
									<div class="col-xl-9 col-lg-9 col-md-8 pr-0 py-2 olf_flex d-flex align-items-center justify-content-between">
										<div class="olf_flex_inner hide_mob"><p class="m-0 p-0"><span class="text-muted medium">Paid using debit card ending with 6472</span></p></div>
										<div class="olf_inner_right"><h5 class="mb-0 fs-sm ft-bold">Total:  @if ($commande->frais && $commande->tax)
                                            <b>{{ $commande->montant() }} DT</b>
                                        @elseif($commande->frais)
                                            <b>{{ $commande->montant() - $commande->getTVA() }} DT</b>
                                        @elseif($commande->tax)
                                            <b>{{ $commande->montant() - $commande->frais }} DT</b>
                                        @else
                                            <b>{{ $commande->montant() - $commande->frais - $commande->getTVA() }} DT</b>
                                        @endif</h5></div>
									</div>
								</div>
							</div>
                            @endforeach
							
						</div>
                           
						
						
                          
                            
                        </div>
                    </div>
                </section>
                <!-- ======================= Dashboard Detail End ======================== -->
                
                <!-- ============================= Customer Features =============================== -->
                <section class="px-0 py-3 br-top">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="d-flex align-items-center justify-content-start py-2">
                                    <div class="d_ico">
                                        <i class="fas fa-shopping-basket theme-cl"></i>
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
                                        <i class="far fa-credit-card theme-cl"></i>
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
                                        <i class="fas fa-shield-alt theme-cl"></i>
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
                                        <i class="fas fa-headphones-alt theme-cl"></i>
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
                <!-- ======================= Customer Features ======================== -->
         
</main>


@endsection


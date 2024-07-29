@extends('front.fixe')
@section('titre', 'Paramètres ')
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
                                      
                                        <li class="breadcrumb-item active" aria-current="page">Mes paramètres</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
              	<!-- ======================= Dashboard Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-start justify-content-between">
					
					@include('front.comptes.sidebar')
						
						<div class="col-12 col-md-12 col-lg-8 col-xl-8">
						
							<!-- row -->
							<div class="card h-100">
								<div class="row">
									<div class="col-xl-6">
										<div class="container-xl px-4 mt-4">
											
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<h6 class="card-header mb-2 text-success">Informations personnelles</h6>
											</div>
	
											@livewire('Profiles.Information')
	
										</div>
									</div>
	
	
									<div class="col-xl-6">
										<div class="container-xl px-4 mt-4">
	
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
													<h6 class="card-header mb-2 text-success">Sécurité</h6>
												</div>
	
												@livewire('Profiles.UpdateProfile')
								  
										</div>
									</div>
	
								</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================= Dashboard Detail End ======================== -->
			


    </main>


@endsection

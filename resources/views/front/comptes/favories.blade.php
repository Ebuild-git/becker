@extends('front.fixe')
@section('titre', 'Mes Favoris')
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
                                        <li class="breadcrumb-item active" aria-current="page">Mes favories</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="middle">
                    <div class="container">
                        <div class="row justify-content-center justify-content-between">
                        
                          @include('front.comptes.sidebar')
                            
                          @livewire('Front.Favoris')
                            
                        </div>
                    </div>
                </section>




                
			<!-- Product View Modal -->
		
			
			<!-- End Modal -->


</main>
@endsection

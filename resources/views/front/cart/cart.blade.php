@extends('front.fixe')
@section('titre', 'Mon panier')
@section('body')
    <main>
    	<div class="gray py-3">
            <div class="container">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                               
                                <li class="breadcrumb-item active" aria-current="page">Mon panier</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart area start-->
        

          
                <div class="row ">
                    <div class="col-12 cart">

                        @livewire('Front.Panier')

                    </div>
                </div>
        
    </main>
@endsection

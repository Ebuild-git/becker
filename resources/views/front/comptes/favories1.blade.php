@extends('front.fixe')
@section('titre', 'Mes Favoris')
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
                            <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">Mes favoris</h1>
                        </div>
                        <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                            <nav>
                                <ul>
                                    <li><span><a  href="{{ route('home') }}">Accueil</a></span></li>
                                    <li class="active"><span>Favoris</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper">
        <div class="page-content">
           
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @livewire('Front.Favoris')
                        </div>
                    </div>
                </div>
           
        </div>
    </div>


</main>
@endsection

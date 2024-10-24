@include('sweetalert::alert')
@php
    $config = DB::table('configs')->first();
    $service = DB::table('services')->get();
    $produit = DB::table('produits')->get();
@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">

    <title>BECKER</title>



    <meta name="author" content="Themezhub" />
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="soukhinkhan">


    <link rel="icon" href="{{ Storage::url($config->icon ?? '') }}" type="image/png" />


    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <!-- Bootstrap CSS -->
    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
 --}}
    <!-- Custom CSS -->
    <link href="/assets/css/styles.css" rel="stylesheet">
    <script src="/Script.js"></script>


{{--     <div id="google_translate_element"></div> --}}

    <script src="script.js"></script> <!-- Inclure si nécessaire -->
    
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en', // Langue par défaut (vous pouvez la modifier à 'fr' si c'est le cas pour votre site)
                includedLanguages: 'fr,en,ar', // Limiter aux langues français, anglais et arabe
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE // Mise en page simple
            }, 'google_translate_element');
        }
    </script>
    
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    


    @yield('SEO')
</head>

<body>



    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader"></div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">




        <!-- Start Navigation -->
        <div class="header header-light dark-text">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{ route('home') }}">
                            {{--  <img src="assets/img/logo.png" class="logo" alt="" /> --}}
                            <img src="{{ Storage::url($config->logo ?? ' ') }}" alt="Logo" />
                        </a>

                        <style>
                            /* Style de base pour le conteneur de la marque */
                            .nav-brand {
                                display: flex;
                                align-items: center;
                                text-decoration: none;
                                padding: 0px;
                            }

                            /* Style pour l'image du logo */
                            .nav-brand img {
                                height: 90px;
                                width: 80px;
                                object-fit: contain;
                                transition: transform 0.3s ease;
                                margin-top: -11px;
                            }

                            @media (max-width: 768px) {
                                .nav-brand img {
                                    height: 100px;
                                    width: 100px;
                                    margin-top: 0;
                                    padding: 10;
                                    margin-left: 20px;



                                }
                            }

                            .menu-toggle {
                                display: none;
                                font-size: 2em;
                                cursor: pointer;
                                margin-left: auto;
                            }

                            /* Effet de survol pour le logo */
                            .nav-brand:hover img {
                                transform: scale(1.1);
                            }

                            /* Ajustements pour le logo dans différents contextes */
                            .navbar .nav-brand {
                                padding: 5px;
                            }

                            .navbar .nav-brand img {
                                max-height: 50px;
                            }
                        </style>
                        <div class="nav-toggle"></div>
                        <div class="mobile_nav">
                            <ul>
                                <li>
                                    <a href="#" onclick="openSearch()">
                                        <i class="lni lni-search-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#login">
                                        <i class="lni lni-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="openWishlist()">
                                        <i class="lni lni-heart"></i><span class="dn-counter">
                                            @if (auth()->user())
                                                {{ Auth::user()->favoris->count() }}
                                            @endif
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="openCart()">
                                        <i class="lni lni-shopping-basket"></i><span class="dn-counter">0</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">

                            <li><a href="{{ route('home') }}">Accueil</a>

                            </li>


                            <li><a href="{{ route('shop') }}">Shop</a></li>


                            <li><a href="{{ route('contact') }}">Contact</a></li>

                            @if (auth()->user())
                                <li> <a href="{{ route('comptes') }}">

                                        Mon compte
                                    </a>
                            @endif
                            </li>
                            @guest



                            @else
                                @if (auth()->user()->role != 'client')
                                    <li><a href="{{ url('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                                    </li>
                                @endif





                            @endguest



                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">
                            <li>
                                <a href="#" onclick="openSearch()">
                                    <i class="lni lni-search-alt"></i>
                                </a>
                            </li>
                            @if (auth()->user())
                                <li><a href="javascript:void(0);">{{ Auth::user()->prenom ?? ' ' }}</a>
                                    <ul class="nav-dropdown nav-submenu">
                                        <li><a href="{{ route('favories') }}">Mes favories</a></li>
                                        <li><a href="{{ route('comptes') }}">Mes commandes</a></li>
                                        <li><a href="{{ route('profile') }}">Mon profile</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#login">
                                        <i class="lni lni-user"></i>
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a href="#" {{-- href="{{ route('favories') }}  --}} onclick="openWishlist()">
                                    <i class="lni lni-heart"></i><span class="dn-counter">
                                        @if (auth()->user())
                                            {{ Auth::user()->favoris->count() }}
                                        @endif
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="openCart()" class="cart__quantity">
                                    <i class="lni lni-shopping-basket"></i><span id="count-panier-span"
                                        class="dn-counter theme-bg"></span>
                                </a>

                            </li>
                            <li>
                                <div id="google_translate_element"></div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Cart -->
        <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Cart">
            <div class="rightMenu-scroll">
                <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
                    <h4 class="cart_heading fs-md ft-medium mb-0">Mon Panier</h4>
                    <button onclick="closeCart()" class="close_slide"><i class="ti-close"></i></button>
                </div>
                <div class="right-ch-sideBar">

                    <div class="cart-item" id="list_content_panier">
                        
                    </div>

                    <div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
                        <h6 class="mb-0">Total</h6>
                        <h3 class="mb-0 ft-medium" id="montant_total_panier">00</h3>
                    </div>

                    <div class="cart_action px-3 py-3">
                        <div class="form-group">

                            <a href="{{ url('cart') }}" class="btn d-block full-width btn-dark"> Voir le
                                panier</a>

                        </div>
                        <div class="form-group">
                            <a href="{{ url('/commander') }}"
                                class="btn d-block full-width btn-dark-light">Paiement</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-------------end cart-->

        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <main>



            @yield('body')




        </main>
        <!-- =======================la recherche======================================= -->
        <!-- End Modal -->

        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal"
            aria-hidden="true">
            <div class="modal-dialog modal-xl login-pop-form" role="document">
                <div class="modal-content" id="loginmodal">
                    <div class="modal-headers">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="ti-close"></span>
                        </button>
                    </div>

                    <div class="modal-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="m-0 ft-regular">Se connecter</h2>
                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-danger p-3 small">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success p-3 small">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">

                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" id="email"
                                    class="form-control" placeholder="Votre mail*">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    value="" id="password">
                                <span class="input-group-texts" id="togglePassword">
                                    <i class="fa fa-eye"></i>
                                </span>

                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <style>
                                .signup-item {
                                    position: relative;
                                }


                                .input-group-texts {
                                    cursor: pointer;
                                    position: absolute;
                                    right: 50px;
                                    top: 250px;

                                }
                            </style>


                            <div class="form-group">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="flex-1">
                                        <input id="dd" class="checkbox-custom" name="dd"
                                            type="checkbox">
                                        <label for="dd" class="checkbox-custom-label">Souviens-toi de
                                            moi</label>
                                    </div>
                                    <div class="eltio_k2">
                                        <a href="{{ route('forgot-password') }}">Mot de passe perdu?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit"
                                    class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Connexion</button>
                            </div>

                            <div class="form-group text-center mb-0">
                                <p class="extra">Vous n'avez pas de compte?<a id="register" data-toggle="modal"
                                        data-target="#registerModal" href="#" class="text-dark">
                                        M'inscrire</a></p>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog"
            aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="text-center mb-4">
                            <h2 class="m-0 ft-regular">Création compte</h2>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{--  <form id="registerForm"> --}}
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="nom" placeholder="Votre nom"
                                    value="{{ old('nom') }}" required>
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Votre prénom</label>
                                <input type="text" class="form-control" name="prenom" placeholder="Votre prénom"
                                    value="{{ old('prenom') }}" required>
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" placeholder=" Votre Email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input class="form-control" id="password1" required type="password"
                                    value="{{ old('password') }}" name="password" placeholder="Votre mot de passe">
                                <span class="oeil">
                                    <i class="fas fa-eye-slash password-toggleregister"></i>
                                </span>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <style>
                                    .signup-item {
                                        position: relative;
                                    }

                                    .oeil {
                                        cursor: pointer;
                                        position: absolute;
                                        right: 20px;
                                        top: 350px;
                                    }
                                </style>

                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmation de mot de passe</label>
                                   <input id="password-confirm" required placeholder="Confirmer le mot de passe"
                                    type="password" class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>



                            <div class="form-group">
                                <button type="submit"
                                    class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Confirmation</button>
                            </div>

                            <script>
                                const passwordField = document.getElementById('password1');
                                const toggleButton = document.querySelector('.password-toggleregister');

                                toggleButton.addEventListener('click', function() {
                                    if (passwordField.type === 'password') {
                                        passwordField.type = 'text';
                                        this.classList.remove('fa-eye-slash');
                                        this.classList.add('fa-eye');
                                    } else {
                                        passwordField.type = 'password';
                                        this.classList.remove('fa-eye');
                                        this.classList.add('fa-eye-slash');
                                    }
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Search -->
        <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;"
            id="Search">
            <div class="rightMenu-scroll">
                <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
                    <h4 class="cart_heading fs-md ft-medium mb-0">Rechercher un produit</h4>
                    <button onclick="closeSearch()" class="close_slide"><i class="ti-close"></i></button>
                </div>

                <div class="cart_action px-3 py-4">

                    <form class="form m-0 p-0" role="search" action="{{ url('search') }}" method="get">
                        @csrf
                        <div class="form-group">

                            <input type="search" name="search" class="form-control" value="{{ $nom ?? '' }}"
                                placeholder="Rechercher un produit" required>

                        </div>

                        <div class="form-group">
                            <select class="custom-select" id="categorySelect">

                                <option value="">Choisir une categorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" value="Search" class="btn d-block full-width btn-dark">Chercher
                            </button>


                        </div>
                    </form>
                </div>



            </div>
        </div>


        <!-- wishlist-->

        <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;"
            id="Wishlist">
            <div class="rightMenu-scroll">
                <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
                    <h4 class="cart_heading fs-md ft-medium mb-0">Mes favoris</h4>
                    <button onclick="closeWishlist()" class="close_slide"><i class="ti-close"></i></button>
                </div>
                <div class="right-ch-sideBar">

                    <div class="cart_select_items py-2">

                        <!-- Single Item -->
                        @foreach ($favoris as $key => $favori)
                            @if ($favori->produit)
                                <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
                                    <input type="hidden" name="id">
                                    <div class="cart_single d-flex align-items-center">
                                        <div class="cart_selected_single_thumb">
                                            <a href="#"><img
                                                    src="{{ Storage::url($favori->produit->photo ?? ' ') }}"
                                                    width="60" class="img-fluid" alt="" /></a>
                                        </div>
                                        <div class="cart_single_caption pl-2">
                                            <h4 class="product_title fs-sm ft-medium mb-0 lh-1">
                                                {{ $favori->produit->nom ?? '' }}</h4>
                                            {{-- <p class="mb-2"><span class="text-dark ft-medium small">36</span>, <span class="text-dark small">Red</span></p> --}}
                                            <h4 class="fs-md ft-medium mb-0 lh-1">{{ $favori->produit->prix }} DT</h4>
                                        </div>
                                    </div>
                                    <div class="fls_last">
                                        <form method="GET" action="{{ url('favoris', $favori->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-flat " data-toggle="tooltip"
                                                title='Delete'><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" width="25"
                                                    style="background-color: #b2e21522; fill:#f80a0a;" height="25"
                                                    fill="currentColor">
                                                    <path
                                                        d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                                                    </path>
                                                </svg></button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach




                    </div>



                </div>
            </div>
        </div>

        <!-- Footer area start -->
        <!-- ============================ Footer Start ================================== -->
        <footer class="dark-footer skin-dark-footer">

            <div class="footer-middle">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <div class="footer_widget">
                                <img src="assets/logo/blanc2.png" class="img-footer small mb-2" alt="" /> 
                                      {{-- <img class="img-footer small mb-2" src="{{ Storage::url($config->logoHeader) }}"
                                    alt="Logo" height="100" width="100" />  --}}
                                   
                                   
                                <div class="address mt-3">
                                    {{ $config->adresse ?? ' ' }}
                                </div>
                                <div class="address mt-3">
                                    {{ $config->telephone ?? ' ' }}<br>{{ $config->email ?? ' ' }}
                                </div>
                                <div class="address mt-3">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="{{ $config->facebook ?? ' ' }}"><i
                                                    class="lni lni-facebook-filled"></i></a></li>


                                        <li class="list-inline-item"><a href="{{ $config->instagram ?? ' ' }}"><i
                                                    class="lni lni-instagram-filled"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                            <div class="footer_widget">
                                <h4 class="widget_title">Réseaux sociaux</h4>
                                <ul class="footer-menu">
                                    <li><a href="{{ $config->facebook ?? ''}}">Facebook</a></li>
                                    <li><a href="{{ $config->instagram ?? ' ' }}">Instagram</a></li>
                                  
                                {{--     <li><a href="{{ $config->tiktok }}">TikTok</a></li>
                                    <li><a href="{{ $config->youtube }}">Youtube</a></li>
                                     --}}
                                   
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                            <div class="footer_widget">
                                <h4 class="widget_title">Liens utils</h4>
                                <ul class="footer-menu">
                                    <li><a href="{{ route('home') }}">Accueil </a>
                                    </li>
                                    <li><a href="{{ route('shop') }}">Shop</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                            <div class="footer_widget">
                                <h4 class="widget_title">Compte</h4>
                                <ul class="footer-menu">
                                    @if (auth()->user())
                                        <li><a href="{{ route('profile') }}">Paramètres
                                            </a></li>
                                        <li><a href="{{ route('comptes') }}"> Mes commandes
                                            </a></li>
                                        <li><a href="{{ route('favories') }}"> Mes favories
                                            </a></li>
                                    @else
                                        <li class="current">
                                            <a href="{{ route('register') }}">Inscription</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('login') }}">Connexion</a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <div class="footer_widget">
                                <h4 class="widget_title">BECKER</h4>
                                <p class="justify-text"  style="text-align: justify;">{{ $config->description ?? ' '}}</p>
                                <div class="foot-news-last">
                             
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 text-center">
                            <p class="mb-0">© 2024 BECKER. Designd By <a href="#"
                                    style="color: #c71f17;">
                                   <b> BECKER </b>
                                </a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ============================ Footer End ================================== -->

        <!-- Footer area end -->

        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/ion.rangeSlider.min.js"></script>
        <script src="/assets/js/slick.js"></script>
        <script src="/assets/js/slider-bg.js"></script>
        <script src="/assets/js/lightbox.js"></script>
        <script src="/assets/js/smoothproducts.js"></script>
        <script src="/assets/js/snackbar.min.js"></script>
        <script src="/assets/js/jQuery.style.switcher.js"></script>
        <script src="/assets/js/custom.js"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->

        <script>
            function openWishlist() {
                document.getElementById("Wishlist").style.display = "block";
            }

            function closeWishlist() {
              document.getElementById("Wishlist").style.display = "none";

            }
        </script>

        <script>
            function openCart() {
              
              
                document.getElementById("Cart").style.display = "block";
         

            }

            function closeCart() {

                document.getElementById("Cart").style.display = "none";
        
            }
        </script>

        <script>
            function openSearch() {
                document.getElementById("Search").style.display = "block";
            }

            function closeSearch() {
                document.getElementById("Search").style.display = "none";
            }
        </script>
    </div>
</body>

</html>

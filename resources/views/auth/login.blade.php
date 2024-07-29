@extends('front.fixe')
@section('titre', 'Connexion')
@section('body')

    <main>
        @php
            $config = DB::table('configs')->first();
            $service = DB::table('services')->get();
            $produit = DB::table('produits')->get();
        @endphp


        <br><br>
        <!-- register area start  -->

        <div class="register-area pt-120 pb-120">
            <div class="container container-small">
                <div class="row">
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="all-content">
                            <div class="title-wrapper text-center mb-40">
                                <h3 class="title">Se connecter</h3>
                                
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
                                <div class="signup-form-wrapper">
                                    <div class="item-thumb">
                                        <div class="signup-item">
                                        <label for="">Adresse mail</label>
                                            <input type="email" class="form-control"
                                                value="{{ old('email') }}"id="email" name="email"
                                                placeholder="Email" />
                                                @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                        </div>
                                        <label for="">Mot de passe</label>
                                        <div class="signup-item mb-1">
                                            <input type="password" class="form-control" placeholder="Password"
                                                name="password" value="" id="password" />
                                            <span class="input-group-text" id="togglePassword">
                                                <i class="fa fa-eye"></i>
                                            </span>

                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-end mb-2">
                                        <a href="{{ route('forgot-password') }}">Mot de passe oublié</a>
                                        </div>
                                        <style>
                                            .signup-item {
                                                position: relative;
                                            }


                                            .input-group-text {
                                                cursor: pointer;
                                                position: absolute;
                                                right: 10px;
                                                top: 20px;
                                            }
                                        </style>

                                    </div>
                                    <div class="button">

                                        <div class="sing-buttom mb-20">
                                            <button class="sign-btn"type="submit"><span>Connexion</span></button>
                                        </div>
                                    </div>
                                    {{--  <div class="bottom-button">
                                    </div> --}}
                                </div>
                            </form>
                                <div class="text-center mt-3">
                                    Vous n'avez pas de compte ? 
                                    <a href="{{ url('register') }}">
                                    <b class="color" >M'inscrire</b>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- register area end  -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const togglePassword = document.getElementById('togglePassword');
                const password = document.getElementById('password');
                if (togglePassword && password) {
                    togglePassword.addEventListener('click', function() {
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        this.firstElementChild.classList.toggle('fa-eye-slash');
                    });
                } else {
                    console.error("Element with id 'togglePassword' or 'password' not found!");
                }
            });
        </script>

    </main>
@endsection

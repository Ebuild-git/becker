@extends('front.fixe')
@section('titre', 'Création compte')
@section('body')

    <main>
        @php
            $config = DB::table('configs')->first();
            $service = DB::table('services')->get();
            $produit = DB::table('produits')->get();
        @endphp
        <br>
        <br>

        <!-- register area start  -->

        <div class="register-area pt-120 pb-120">
            <div class="container container-small">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="all-content">
                            <div class="title-wrapper text-center mb-40">
                                <h3 class="title">Création de compte</h3>

                            </div>


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="signup-form-wrapper">
                                <form method="POST" action="{{ route('register') }}">

                                    @csrf
                                    <div class="item-thumb">
                                        <div class="signup-item">
                                            <h6>Votre nom</h6>
                                            <input type="text" name="nom" placeholder="Votre nom"
                                                value="{{ old('nom') }}" required />
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="signup-item">
                                            <h6>Votre prenom</h6>
                                            <input type="text" name="prenom" value="{{ old('prenom') }}"
                                                placeholder="Votre prénom" required width="100" />
                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="signup-item">
                                            <h6>Email </h6>
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                placeholder=" Votre Email" required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="signup-item">
                                            <h6>Mot de passe</h6>
                                           
                                                <input id="password" required type="password" placeholder="Votre mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    


                                            <span class="input-group-text">
                                                <i class="fas fa-eye-slash password-toggle"></i>
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

                                                .input-group-text {
                                                    cursor: pointer;
                                                    position: absolute;
                                                    right: 10px;
                                                    top: 48px;
                                                }
                                            </style>


                                        </div>
                                        <div class="signup-item">
                                            <h6>Confirmation mot de passe</h6>
                                            <input id="password-confirm" required placeholder="Confirmer le mot de passe"
                                                type="password" class="form-control" name="password_confirmation" required
                                                autocomplete="new-password">

                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="button">

                                        <div class="sing-buttom mb-20">
                                            <button type="submit"><span class="sing-btn">Enregistrer</span></button>
                                        </div>
                                    </div>
                                    {{--  <div class="bottom-button">
                                    </div> --}}

                                </form>

                                <script>
                                    const passwordField = document.getElementById('password');
                                    const toggleButton = document.querySelector('.password-toggle');

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
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- register area end  -->
    </main>
@endsection

@extends('front.fixe')

@section('body')
    <main>
      
        <!-- error area start -->
        <br><br><br>
       

         <section class="middle">
            <div class="container">
            
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                        <!-- Icon -->
                        <div class="p-4 d-inline-flex align-items-center justify-content-center circle bg-light-danger text-danger mx-auto mb-4"><i class="ti-face-smile fs-lg"></i></div>
                        <!-- Heading -->
                        <h2 class="mb-2 ft-bold">Désolé, page introuvable.</h2>
                        <!-- Text -->
                        <p class="ft-regular fs-md mb-5">La page que vous recherchez ne se ferme pas. Veuillez l'essayer</p>
                        <!-- Button -->
                        <a class="btn btn-dark"  href="{{ route('home') }}">Retour a l'Accueil</a>
                    </div>
                </div>
                
            </div>
        </section>
   
    </main>


    <style>
        .img {
            max-width: 100%;
            width: 500px;
        }
    </style>
@endsection

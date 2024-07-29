<div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center miliods">
    <div class="d-block border rounded">
      {{--   <div class="dashboard_author px-2 py-5">
         
            <div class="dash_caption">
                <h4 class="fs-md ft-medium mb-0 lh-1"> {{ Auth::user()->prenom ?? ' '}} {{ Auth::user()->nom ?? ' '}}</h4>
                <span class="text-muted smalls">Tunisie</span>
            </div>
        </div>
         --}}
        <div class="dashboard_author">
            <h4 class="px-3 py-2 mb-0 lh-2 gray fs-sm ft-medium text-muted text-uppercase text-left">Mon dashbord</h4>
            <ul class="dahs_navbar">
                <li><a href="{{ route('comptes') }}" ><i class="lni lni-shopping-basket mr-2"></i>Mes commandes</a></li>
                <li><a href="{{ route('favories') }}"  ><i class="lni lni-heart mr-2"></i>Mes favories</a></li>
                <li><a href="{{ route('profile') }}"><i class="lni lni-user mr-2"></i>Mon profile</a></li>
                
                
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
        </div>
        
    </div>
</div>
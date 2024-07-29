<div>
    @include('components.alert')

    <form wire:submit="update_user">
        <div class="card-body">

            <div class="row gutters">

                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="nom">Nom</label>
                        <input wire:model="nom" type="text" {{ Auth::user()->nom }} class= "form-control"
                            style="font-size: 18px; color:black">
                        @error('nom')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12 ">
                    <div class="signup-item">
                        <label class="small mb-1" for="prenom">Prénon</label>
                        <input wire:model="prenom" type="text" {{ Auth::user()->prenom }} class= "form-control">
                        @error('prenom')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="email">Email</label>
                        <input type="text" value=" {{ Auth::user()->email }}" wire:model="email"
                            class= "form-control">
                        @error('email')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror

                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="telephone">Téléphone</label>
                        <input value=" {{ Auth::user()->phone }}" wire:model="phone" id="inputLocation" type="text"
                            class= "form-control">
                        @error('phone')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="adresse">Addresse</label>
                        <input type="text" value=" {{ Auth::user()->adresse }}" wire:model="adresse"
                            class= "form-control">
                        @error('adresse')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror

                    </div>
                </div>

            </div>

            <style>
                .custom-button {
                    background-color: #3015e222;
                    font-size: 18px;
                    /* Adjust the font size as needed */
                }
            </style>
            <br>
            <br>

            <div class="row gutters  " style="font-size: 24%">
              {{--   <button class="btn btn-success custom-button" style=" background-color: #7115e222;" type="submit">

                    <i class="fa fa-save mr-1"></i>
                    Confirmer les changements
                </button> --}}

                
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<button type="submit" class="btn btn-dark">Enregistrer les changement</button>
										</div>
									</div>
            </div>
        </div>

    </form>


</div>

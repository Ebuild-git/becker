<div>
    @include('components.alert')

    <form wire:submit="update_user">
        <div class="card-body">

            <div class="row gutters">

                <div class="col-xl-12">
                    <div class="signup-item">

                        <label class="small mb-1" for="RePassword">Ancien mot de passe</label>
                        <input type="password" value=" {{ Auth::user()->old_password }}"placeholder="8 - 15 Characters"
                            wire:model="old_password" class= "form-control" >
                        @error('old_password')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="RePassword">Nouveau mot de passe</label>
                        <input type="password" placeholder="8 - 15 caractères" wire:model="password"
                            class= "form-control">
                        @error('password')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1"  for="RePassword">Confirmation</label>
                        <input type="password" placeholder="8 - 15 Caractères" wire:model="password_confirmation"
                            class= "form-control" >
                        @error('password_confirmation')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
            </div>
            <style>
                .custom-button {
    background-color: #3015e222;
    font-size: 18px; /* Adjust the font size as needed */
}
            </style>
            <br><br><br>
            <br><br><br>
            <br><br>
            <br>
            <div class="row gutters" style="font-size: 24%">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Enregistrer les midifications</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

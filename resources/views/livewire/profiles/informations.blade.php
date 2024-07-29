<div>
  @include('components.alert')

  <form wire:submit="update_user">

      <div class="row">


          <div class="col-sm-6">
           
              <hr>
              <div class="tp-footer-input-box mb-20 p-relative">
                  <label class="form-label" for="FullName">
                      Nom
                  </label>
                  <input type="text" value=" {{ Auth::user()->nom }}" wire:model="nom"  class="form-control">
                  @error('nom')
                      <span class="text-danger small"> {{ $message }} </span>
                  @enderror
              </div>
              <div class="tp-footer-input-box mb-20 p-relative">
                  <label class="form-label" for="Email">Email</label>
                  <input type="email"  value=" {{ Auth::user()->email }}" wire:model="email" class="form-control" >
                  @error('email')
                      <span class="text-danger small"> {{ $message }} </span>
                  @enderror
              </div>
              <div class="tp-footer-input-box mb-20 p-relative">
                  <label class="form-label" for="Email">Adresse</label>
                  <input type="text"   value=" {{ Auth::user()->addresse }}" wire:model="adresse" class="form-control">
                  @error('adresse')
                      <span class="text-danger small"> {{ $message }} </span>
                  @enderror
              </div>
              <div class="tp-footer-input-box mb-20 p-relative">
                  <label class="form-label" for="Email">Téléphone</label>
                  <input type="text"   value=" {{ Auth::user()->phone }}" wire:model="phone" class="form-control" >
                  @error('phone')
                      <span class="text-danger small"> {{ $message }} </span>
                  @enderror
              </div>
          </div>


        
          <div class="modal-footer">
           

              
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enregistrer les midifications</button>
                </div>
            </div>
          </div>
      </div>
  </form>
</div>

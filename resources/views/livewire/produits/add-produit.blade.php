<div>

    @include('components.alert')

    @if ($produit)
        <form wire:submit="update_produit">
        @else
            <form wire:submit="create">
    @endif
    @if ($errors->any())
        <div class="alert alert-danger small">
            @foreach ($errors->all() as $error)
                - {{ $error }} <br>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-sm-8">
            <div class="form-check form-switch">

                <input name="sur_devis" class="form-check-input" class="switch" type="checkbox" id="sur_devis"
                    wire:model.lazy="sur_devis" wire:click="sur_devis">
                <label class="form-check-label" for="flexSwitchCheckDefault">Produit sur devis</label>
                @error('sur_devis')
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <br>
        <br>
        <div class="col-sm-8">
            <div class="mb-3">
                <label for="">Nom du produit</label>
                <input type="text" name="nom" class="form-control" wire:model="nom">
                @error('nom')
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-3">
                <label><strong>Description :</strong></label>
                <textarea class=" form-control" name="description" wire:model="description"></textarea>
                @error('description')
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div>


            <div class="row">

             
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tailles </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $chunkSize = 6; // Number of items per row
                                $chunks = $tailles->chunk($chunkSize);
                            @endphp
                
                            @foreach ($chunks as $chunk)
                                <tr>
                                    @foreach ($chunk as $taille)
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input @error('taille') is-invalid @enderror" type="checkbox" id="taille{{ $loop->parent->index }}-{{ $loop->index }}" wire:model="taille" value="{{ $taille }}">
                                                <label class="form-check-label" for="taille{{ $loop->parent->index }}-{{ $loop->index }}">
                                                    {{ $taille }}
                                                </label>
                                            </div>
                                        </td>
                                    @endforeach
                
                                    <!-- Fill remaining cells if the chunk has fewer items than chunkSize -->
                                    @for ($i = count($chunk); $i < $chunkSize; $i++)
                                        <td></td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                    <style>
                        .table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                
                        .table td {
                            padding: 0.5rem;
                            vertical-align: top; /* Aligns content to the top of the cell */
                        }
                
                        .form-check {
                            display: flex;
                            align-items: center;
                        }
                    </style>
                </div>
              


                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <table class="table table-bordered color-table">
                            <thead>
                                <tr>
                                    <th>Couleur(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $chunkSize = 4; // Number of items per row
                                    $chunks = $couleurs->chunk($chunkSize);
                                @endphp

                                @foreach ($chunks as $chunk)
                                    <tr>
                                        @foreach ($chunk as $color)
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="coleur" type="checkbox"
                                                        id="color{{ $loop->parent->index }}-{{ $loop->index }}"
                                                        wire:model="couleur" value="{{ $color['code'] }}">
                                                    <label class="form-check-label"
                                                        for="color{{ $loop->parent->index }}-{{ $loop->index }}">
                                                        <span class="color-swatch"
                                                            style="background-color: {{ $color['code'] }};"></span>
                                                        {{ $color['nom'] }}
                                                    </label>
                                                </div>
                                            </td>
                                        @endforeach

                                        <!-- Fill remaining cells if chunk size is less than chunkSize -->
                                        @for ($i = count($chunk); $i < $chunkSize; $i++)
                                            <td></td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <style>
                        .color-table {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        .color-table td {
                            padding: 0.5rem;
                            vertical-align: top;
                            /* Aligns content to the top of the cell */
                        }

                        .form-check {
                            display: flex;
                            align-items: center;
                        }

                        .color-swatch {
                            display: inline-block;
                            width: 20px;
                            height: 20px;
                            margin-right: 10px;
                            border: 1px solid #ddd;
                            vertical-align: middle;
                        }
                    </style>
                </div>
 
            


                <div class="col-sm-6 mb-3">
                    <label for="">Categorie </label>
                    <select wire:model='category_id' class="form-control @error('category_id') is-invalid @enderror">
                        <option value=""></option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>








                @if (!$sur_devis)
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="">Prix de vente</label>
                            <input type="number" step="0.1" name="prix" class="form-control" wire:model="prix">
                            @error('prix')
                                <span class="text-danger small"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="">Prix d'achat</label>
                            <input type="number" step="0.1" name="prix_achat" class="form-control"
                                wire:model="prix_achat">
                            @error('prix_achat')
                                <span class="text-danger small"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                @endif





                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="">Référence du produit</label>
                        <input type="text" step="0.1" name="reference" class="form-control"
                            wire:model="reference">
                        @error('reference')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="mb-3">
                <label for="">Photo d'illustration</label>
                <div class="preview-produit-illustration" onclick="preview_illustration('new-prosduit')">
                    @if ($produit)
                        @if ($photo2 && is_null($photo))
                            <img src="{{ Storage::url($photo2) }}" alt="" class="w-100">
                        @else
                            <img src="{{ $photo->temporaryUrl() }}" alt="" srcset="">
                        @endif
                    @else
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="" class="w-100">
                        @else
                            <img src="/icons/no-image.webp" alt="" class="w-100">
                        @endif
                    @endif
                </div>
                <input type="file" name="photo" accept="image/*" class=" d-none" id="file-input-new-prosduit"
                    wire:model="photo">
                @error('photo')
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Autres photos</label>
                <input type="file" multiple name="photos" accept="image/*" class="form-control" wire:model="photos">
                @error('photos')
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div>

        </div>
    </div>
    <div style="text-align: right;">
        <button class="btn btn-primary btn-sm px-5" type="submit" wire:loading.attr="disabled">
            <span wire:loading>
                <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
            </span>
            @if ($produit)
                Mettre a jour
            @else
                Enregistrer le produit
            @endif
        </button>
    </div>
    </form>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

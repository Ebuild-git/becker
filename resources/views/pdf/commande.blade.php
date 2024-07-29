@php
    $config = DB::table('configs')->select('icon', 'logo', 'matricule', 'telephone')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reçu de commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }


        .logo {
            width: 150px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
        }

        .produit {
            height: 70px !important;
            height: 70px !important;
            border-radius: 10px;
            overflow: hidden;
        }

        .produit img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .tr-montant {
            color: white !important;
            background-color: #000000;
            text-align: right !important
        }

        .text-center {
            text-align: center !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="text-align: center">

            <center>
             
                <img src="{{ config('app.app_url') }}{{ asset(Storage::url($config->icon)) }}" alt="logo" width="100" height="100"
                srcset=""> {{--  
                <img src="data:image/png;base64,{{ base64_encode((public_path(Storage::url($config->icon)))) }}" alt="logo" srcset="">
          --}}    </center>
 
        </div>
        <h1 style="color: #000000">
            {{ config('app.name') }}</h1>
           
            Matricule: {{ $config->matricule ?? ' ' }}
            <br>
            <br>
            Téléphone: {{ $config->telephone ??  ' '}}
        
        <h5>Informations sur la commande : #{{ $commande->id }}</h5>
        <p><strong>Date de commande:</strong> {{ $commande->created_at }}</p>

        <h3>Produits commandés :</h3>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = $commande->frais ?? 0;
                @endphp
                @foreach ($commande->contenus as $item)
                    <tr>
                        <td>
                            @if ($item->type == 'produit')
                                {{ $item->produit->nom }}
                            @else
                                {{ $item->pack->nom }}
                            @endif
                            ({{ $item->type }})
                        </td>
                        <td>
                            {{ $item->quantite }}</td>
                        <td>
                            @if ( $commande->tax)
                                <b>{{number_format( $commande->getPrix() * $item->quantite, 2, ',', ' ') }} DT</b>
                                @else
                              {{--   {{ $item->prix_unitaire }} DT --}}
                                <b>{{number_format(  $item->prix_unitaire  * $item->quantite, 2, ',', ' ') }} DT</b>
                            @endif
                           
                        </td>
                        <td>{{-- {{ $item->prix_unitaire * $item->quantite }} DT --}}

                                @if ( $commande->tax)
                            <b>{{number_format( $commande->getPrix() * $item->quantite, 2, ',', ' ') }} DT</b>
                       
                        @else
                            <b> {{ $item->prix_unitaire * $item->quantite }} DT </b>
                        @endif 
                        </td>
                    </tr>
                    @php
                        $total += $item->prix_unitaire * $item->quantite;
                    @endphp
                @endforeach
                <tr>
                    <td>
                        <b>Frais de livraison </b>
                    </td>
                    <td>1</td>
                    <td> {{number_format( $commande->frais ?? 0, 2, ',', ' ') }} DT </td>
                    <td> {{number_format( $commande->frais ?? 0, 2, ',', ' ') }} DT </td>
                </tr>

                <tr>
                    <td>
                        <b>TVA </b>
                    </td>
                    @if ($commande->tax)
                        <td> A {{ $commande->tax }} %</td>
                        <td>--</td>
                        <td> {{ number_format($commande->getTVA(), 2, ',', ' ')}} DT </td>
                    @else
                        <td> A 00 %</td>
                        <td>00 DT</td>
                        <td> 00 DT </td>
                    @endif


                </tr>
                <tr>
                    <td>
                        <b>Frais de timbre </b>
                    </td>
                    <td>1</td>
                    <td> 1 DT </td>
                    <td> 1 DT </td>
                </tr>
                <tr class="tr-montant">
                    <td colspan="3">
                        <b>Total net à payer:</b>
                    </td>
                    <td>
                        @if ($commande->frais && $commande->tax)
                            <b>{{number_format( $commande->montantHT() + $commande->frais + 1, 2, ',', ' ') }} DT</b>
                        @elseif($commande->frais)
                            <b>{{ number_format($commande->montant() + 1, 2, ',',' ') }} DT</b>
                        @elseif($commande->tax)
                            <b>{{ number_format($commande->montantHT() + 1, 2, ',', ' ') }} DT</b>
                        @else
                            <b>{{ number_format($commande->montant() - $commande->frais + 1), 2, ',', ' ' }} DT</b>
                        @endif

                    </td>
                    {{--  <td>
                        @foreach ($commande->contenus as $item)
                        {{ $item->prix_unitaire * $item->quantite }} DT
                        @endforeach
                    </td> --}}

                </tr>
            </tbody>
        </table>


        <h4>Informations de livraison :</h4>
        <p><strong>Nom complet:</strong> {{ $commande->prenom }} {{ $commande->nom }}</p>
        <p><strong>Adresse de livraison:</strong> {{ $commande->adresse ?? 'N/A' }}</p>
        <p><strong>Numéro de téléphone:</strong> {{ $commande->phone ?? 'N/A' }}</p>
        <p><strong>Pays:</strong> {{ $commande->pays ?? 'N/A' }}</p>
        <p><strong>Gouvernorat:</strong> {{ $commande->gouvernorat ?? 'N/A' }} </p>
        <hr>

        <p>
            Nous vous remercions pour votre commande !
            <br> Si vous avez des questions ou des préoccupations, n'hésitez
            pas à nous contacter .
        </p>
    </div>
</body>

</html>

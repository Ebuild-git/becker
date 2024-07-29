<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message d'alerte sur  le stock de produit </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            text-align: left;
        }

        .total {
            font-weight: bold;
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
    </style>
</head>

<body>
    <div class="container">
       {{--  <img src="https://agrihub.online/icons/logo%20png.png" alt="logo" height="50" srcset=""> --}}
        <h2>Rupture du stock sur le produit [ #{{ $order->produit->nom}} ] </h2>
        
        <p>
            Votre commande sera bientôt traitée. <br>
            Merci d'avoir magasiné avec nous!
        </p>
    </div>
</body>

</html>

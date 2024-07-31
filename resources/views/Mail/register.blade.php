<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue chez BECKER</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e0e0e0;
        }
        .header {
            text-align: center;
            background-color: #1c1b1a;
            padding: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            color: #0e0f0d;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f4;
            border-top: 1px solid #e0e0e0;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #0d0d0c;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
      
        <div class="content">
            <h1>Bienvenue chez  BECKER !</h1>
            <p>Bonjour {{ $user->nom }} ,</p>
            <p>Merci de vous être inscrit et de rejoindre notre communauté de passionnés de mode. Nous sommes ravis de vous accueillir et avons hâte de vous aider à découvrir les dernières tendances et les pièces uniques qui feront briller votre style</p>
            <p>Votre inscription a été réalisée avec succès. Vous pouvez dès à présent explorer notre large gamme de produits et profiter de nos offres exclusives réservées aux membres.</p>
            <a href="{{ url('/shop') }}" class="button">Découvrir nos produits</a>
        </div>
        <div class="footer">
            <p>&copy; 2024  BECKER. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/720778cbce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="log.css">
    <title>Document</title>
</head>
<body>
    <div class='part1'>
        <i class="fa-brands fa-twitter"></i>
    </div>
    <div class='part2'>
        <div class='titre'>
            <h1>Ça se passe maintenant</h1>
        </div>
        <div class='incription'>
            <h2>Inscrivez vous.</h2>
            <form action="database.php" method="POST">

                <input type="hidden" name="form" value="ajoutUser">
        
                <input type="text" placeholder="Nom" name="full_name" id="full_name">
        
                <input type="text" placeholder="E-mail" name="email" id="email">
        
                <input type="password" placeholder="Mot de passe" name="password" id="password">
        
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>
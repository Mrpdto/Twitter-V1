<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: log.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/720778cbce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Twitter</title>
</head>
<body>
    <section class='menu'>
        <div class='menuBlock'>
            <div class="titre">
                <i class="fa-brands fa-twitter"></i>
                <h1>Twitter</h1>
            </div>
            <div class='menuLiens'>
                <a href="#" class='position'>
                    <i class="fa-solid fa-house"></i>
                    <p>Accueil</p>
                </a>
                <a href="recherche.php">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <p>Explore</p>
                </a>
                <a href="profil.php">
                    <i class="fa-solid fa-user"></i>
                    <p>Profil</p>
                </a> 
            </div>
            <div class='postButton'>
                Poster
            </div>
        </div>
    </section>
    <section class='accueil'>
            <section class='filActu'>
                <div class='filOptions'>
                    <div class='filOptionsBoite'>
                        <p>Pour toi</p>
                        <div class='traitBleu'></div>
                    </div>
                </div>
                <div class='post'>
                    <i class="fa-solid fa-user"></i>
                    <form action="database.php" method='POST'>
                        <input type="hidden" name="form" value="ajoutPost">
                        
                        <input class='postInput' type="text" placeholder="Qu'est-ce qu'il se passe?!" autocomplete="off" name="contenu" id="contenu">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user']; ?>">

                        <button type="submit">Poster</button>
                    </form>
                </div>
                <div class='tweets'>
                    <?php require 'database.php'; ?>
                    <?php foreach($tweet as $tweet): ?>
                        <div class='tweet'>
                            <div class='tweetPdp'>
                                <i class="fa-solid fa-user"></i>
                                <a href="delete.php?id=<?php echo $tweet['tweet_id'] ?>"><i class="fa-solid fa-xmark croix"></i></a>
                            </div>
                            <div class='tweetContenu'>
                                <p class='tweetUser'><?php echo $tweet['full_name']; ?></p>
                                <p><?php echo $tweet['contenu']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <section class='autre'>
                
            </section>
    </section>
</body>
</html>

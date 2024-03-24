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
                <a href="index.php">
                    <i class="fa-solid fa-house"></i>
                    <p>Accueil</p>
                </a>
                <a href="recherche.php">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <p>Explore</p>
                </a>
                <a href="#" class='position'>
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
                <div class='profile'>
                    <i class="fa-solid fa-user iconProfile"></i>
                    <div class='part1'></div>
                    <div class='part2'>
                        <form class='deconexion' action="database.php" method='POST'>
                            <input type="hidden" name='form' value='logout'>

                            <button type='submit'>Déconnexion</button>
                        </form>
                        <?php require 'database.php'; ?>
                        <?php
                            $userId = $_SESSION['user'];

                            $requete3 = $database->prepare('SELECT full_name FROM user WHERE id = :userId');
                            $requete3->bindParam(':userId', $userId);
                            $requete3->execute();
                            $userName = $requete3->fetch(PDO::FETCH_ASSOC);

                            echo "<h2 class='nomProfil'>".$userName['full_name']."</h2>";
                        ?>
                    </div>
                </div>
                <div class='filOptions'>
                    <div class='filOptionsBoite'>
                        <p>Vos Posts</p>
                        <div class='traitBleu'></div>
                    </div>
                </div>
                <div class='tweets'>
                    <?php

                        $requete4 = $database->prepare('SELECT * FROM tweet INNER JOIN user ON tweet.user_id = user.id WHERE tweet.user_id = :userId ORDER BY tweet.tweet_id DESC');
                        $requete4->bindParam(':userId', $userId);
                        $requete4->execute();
                        $tweetPerso = $requete4->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($tweetPerso as $tweet): ?>
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
                        <?php endforeach;
                    ?>
                </div>
            </section>
            <section class='autre'>
                
            </section>
    </section>
</body>
</html>






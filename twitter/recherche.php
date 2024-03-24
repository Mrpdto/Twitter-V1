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
                <a href="#" class='position'>
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
                <div class='filOptions recherche'>
                    <form action="" method='GET'>
                        <label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
                        <input type="text" id="search" placeholder="Recherchez" autocomplete="off" name='search'> 
                    </form>
                </div>
                
                <div class='tweets'>
                    <?php require 'database.php'; ?>
                    <?php if (!empty($_GET['search'])){ 
                        foreach($tweet as $tweet):
                            if (str_contains($tweet['contenu'], $_GET['search'])) {?>
                                <div class='tweet'>
                                    <div class='tweetPdp'>
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class='tweetContenu'>
                                        <p class='tweetUser'><?php echo $tweet['full_name']; ?></p>
                                        <p><?php echo $tweet['contenu']; ?></p>
                                    </div>
                                </div>
                            <?php
                            }?>
                            <?php endforeach; ?>
                            <?php
                    } else{?>
                        <?php
                        foreach($tweet as $tweet): ?>
                            <div class='tweet'>
                                <div class='tweetPdp'>
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class='tweetContenu'>
                                    <p class='tweetUser'><?php echo $tweet['full_name']; ?></p>
                                    <p><?php echo $tweet['contenu']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php
                        
                    }
                    ?>
                </div>
            </section>
            <section class='autre'>
                
            </section>
    </section>
</body>
</html>
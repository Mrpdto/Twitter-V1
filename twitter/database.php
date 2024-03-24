<?php
session_start();



try {
    // Connecte à la base de données 'twitter' avec l'utilisateur 'root' et le mot de passe 'root'
    $database = new PDO('mysql:host=localhost;dbname=twitter', 'root', 'root');
} catch(PDOException $e){
    die('Site indisponible');
}

$requete = $database->prepare('SELECT * FROM user ');
$requete2 = $database->prepare('SELECT * FROM tweet INNER JOIN user ON tweet.user_id = user.id ORDER BY tweet.tweet_id DESC');
$requete->execute();
$requete2->execute();
$user = $requete->fetchAll(PDO::FETCH_ASSOC);
$tweet = $requete2->fetchAll(PDO::FETCH_ASSOC);




// Vérifie si le formulaire est soumis via POST et que le nom du formulaire est 'ajoutUser'
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] =='ajoutUser' ) {
    if($_POST['full_name'] !='' && $_POST['email']!='' && $_POST['password']!=''){
        $data = [
            'id' =>uniqid(),
            'full_name' => $_POST['full_name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        
        // Prépare la requête SQL pour insérer un nouvel utilisateur dans la base de données
        $requete = $database->prepare("INSERT INTO user(id, full_name, email, password) VALUES (:id, :full_name, :email, :password)");
        
        // Exécute la requête SQL avec les données fournies
        if ($requete->execute($data)){
            echo "utilisateur ajouté !";
            $_SESSION['user'] = $data['id'];
            header('Location: index.php');
        } else {
            echo "erreur à l'ajout";
        }
        
    } else{
        echo "Formulaire incomplet ";
        header('Location: log.php');
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'ajoutPost') {
    if ($_POST['contenu'] != '') {
        $data2 = [
            'contenu' => $_POST['contenu'],
            'user_id' => $_POST['user_id']
        ];

        $requete2 = $database->prepare("INSERT INTO tweet(contenu, user_id) VALUES (:contenu, :user_id)");

        if ($requete2->execute($data2)) {
            echo "Post ajouté";
            header('Location: index.php');
        } else {
            echo "Erreur à l'ajout";
        }
    } else {
        echo "Formulaire incomplet";
        header('Location: index.php');
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'logout'){
    session_destroy();
    header('Location: index.php');
    exit;
}   



// if($user && password_verify($_POST['password'], $user['password'])){
//     $_SESSION['id'] = $user['id'];
//     header('Location: index.php');
//     exit;
// } else {
//     echo 'Mauvais mot de passe';
// }
?>

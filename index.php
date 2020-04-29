<!-- Ma Base de données Tableau -->
<?php
session_start();
if (isset($_SESSION['role'])){
    if ($_SESSION['role']== 'admin'){
        $_SESSION['message']='Veuillez vous déconnecter d\'aboord';
        header("Location: innterface_admin.php");
        exit;
    }else{
        $_SESSION['message']='Veuillez vous déconnecter d\'aboord';
        header("Location: interface_joueur.php");
        exit;
    }

}

$json_data= file_get_contents('Jsonfile.json');

$decode_flux= json_decode($json_data, true);


$error="";

if (isset($_POST['btn'])){

    $login= $_POST['pseudo'];
    $password= $_POST['mdp'];

    foreach($decode_flux as $element){
        if ($login== $element['login'] && $password== $element['password']){
            $_SESSION['prenom']= $element['prenom'];
            $_SESSION['nom']= $element['nom'];
            $_SESSION['avatar']= $element['avatar'];
            if ($element['role'] == "joueur"){
                $_SESSION['role']= $element['role'];
                header("Location: pages/interface_joueur.php");
                exit;
            }else{
                $_SESSION['role']= $element['role'];
                header("Location: pages/innterface_admin.php");
                exit;
            }

        }else{
            $error='Login ou Mot de passe incorrecte ';
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/connexion.css">
    <title>Le plaisir de jouer</title>
</head>
<body style="margin: 150px">
    <div class="container">
    <h1 class="plesirs"> Le plaisir de jouer </h1>
        <div class="box">          
            <form enctype="multipart/form-data" method="POST" action="">
        <div class="croit">Login form</div>
                <div>
                    <div class="logtof"><img src="Images/Icônes/ic-login.png" alt="" class="logtoff"></div>
                    <input class="inputMaterial" name="pseudo" type="text" placeholder="login" required>
                </div>
                <div>
                    <div class="logtof"><img src="Images/Icônes/ic-password.png" alt="" class="logtoff"></div>
                    <input type="password" name="mdp" placeholder="mot de pass" required>
                </div>
                <div>
                    <button type="submit" name="btn">Connexion</button>
                <p class="inscrire"><a href="pages/page_compte_joueur.php?section=joueur"> S'inscrire pour jouer</a></p>
                </div>      
            </form>
        </div>
    </div>
</body>
</html>
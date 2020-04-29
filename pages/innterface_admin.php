<?php
session_start();
$avatar= $_SESSION['avatar'];
if (!isset($_SESSION['prenom'])){
    $_SESSION['msg']='Veuillez vous connecter d\'aboord';
    header('Location: player_login_page.php');
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/interface_admin.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="../Images/logo-QuizzSA.png" alt="">
    </div>

    <div class="header_title">
        <h3>Le plaisir de jouer</h3>
        <?php
        if(isset($_SESSION['message'])) {?>
            <p id="msg" style="color: red"><?=$_SESSION['message']?></p>

            <?php
            unset($_SESSION['message']);
             }
            ?>

    </div>
</div>
<div class="background">
    <div class="background_header">
    <div><h2 >CRÉER ET PARAMÉRTER VOS QUIZZ</h2>
        <a href="deconnexion.php"><button class="logout" type="submit">Déconnexion</button></a>
    </div>
    </div>
<div class="form">
    <div class="white">
        <div class="header_white">
            <div class="round">
            <div class="image">

                 <img  src="<?=$avatar?>" alt="">

            </div>
            </div>
            <div class="prenom_nom"><?=$_SESSION['prenom']?> <br> <span class="nom"><?=$_SESSION['nom']?></span></div>
        </div>
        <ul>
            <a href="innterface_admin.php?section=questions_list">
            <div class="menu" >
                <li >Listes Questions</li>
                <img src="../Images/Icônes/ic-liste.png" alt="">
            </div>
            </a>
            <a href="innterface_admin.php?section=admin" >
            <div class="menu">
                <li>Créer Admin</li>
                <img src="../Images/Icônes/ic-ajout.png" alt="">
            </div>
            </a>
            <a href="innterface_admin.php?section=players_list" >
            <div class="menu">
                <li>Listes Joueurs</li>
                <img src="../Images/Icônes/ic-liste.png" alt="">
            </div>
            </a>
            <a href="innterface_admin.php?section=create_questions">
            <div class="menu">
                <li>Créer Questions</li>
                <img src="../Images/Icônes/ic-ajout-active.png" alt="">
            </div>
            </a>
        </ul>

        </div>

    </div>
    <div class="right" >
        <div class="white-right" id="content" >
            <?php
            if (isset($_GET['section'])){
                if ($_GET['section']=='questions_list'){
                    include_once 'lister_questions.php';
                }elseif($_GET['section']=='admin'){
                    include_once 'creer_admin.php';
                }elseif($_GET['section']=='players_list'){
                    include_once 'lister_joueurs.php';
                }elseif($_GET['section']=='create_questions'){
                    include_once 'creer_questions.php';
                }
            }
            ?>
        </div>
    </div>
</div>

<script src="../Js/functions.js">

</script>


</body>
</html>


<?php

require_once 'functions.php';
if (isset($_POST['btn'])){

    save_data_to_json($_POST['login']);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/creer_compte_joueur.css">
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
    </div>
</div>
<div class="form">
    <div class="white">
        <div class="left_side">
        <div class="title">
            <h3>S'INSCRIRE</h3>
            <p>Pour tester votre niveau de culture générale</p>
            <hr>
        </div>
            <form action="" method="post" enctype="multipart/form-data" id="form-connexion">
                <div class="input-form">
            <label for="prenom">Prénom</label> <br>
            <input class="input" type="text" name="prenom" id="prenom" error="error-1"  >
                <div class="error-form" id="error-1"></div>
                </div>
                    <div class="input-form">
            <label for="nom">Nom</label> <br>

            <input class="input" type="text" name="nom" id="nom" error="error-2" >
                <div class="error-form" id="error-2"></div>
                    </div>
                        <div class="input-form">
            <label for="login">Login</label> <br>

            <input class="input" type="text" name="login" id="login" error="error-3" >
                <div class="error-form" id="error-3"></div>
                        </div>
                            <div class="input-form">
            <label for="password">Password</label> <br>

            <input class="input" type="password" name="pwd" id="password" error="error-4" >
                <div class="error-form" id="error-4"></div>
                            </div>
                                <div class="input-form">
            <label for="confirm_password">Confirm Password</label> <br>

            <input class="input" type="password" name="confirm_pwd" id="confirm_password" error="error-5" >
                <div class="error-form" id="error-5"></div>
                                </div>
            <label class="info">* Seuls les fichiers .jpeg .jpg .png sont autorisés</label> <br><br>
            <label class="label" for="avatar">Avatar</label>
                <div class="input-form">
            <input type="file"  name="file" id="avatar" accept=".jpg, .JPG, .jpeg, .png, .PNG"
                    onchange="load_image(this)" error="error-6" >
                    <div class="error-form" id="error-6"></div>
                </div>
            <input class="btn_compte" type="submit" name="btn" value="Créer compte">
            </form>
        </div>
        <div class="right_side">
           <div class="avatar" >
               <img id="img">
           </div>
        </div>
    </div>
</div>
<script src="../Js/functions.js">

</script>

</body>
</html>

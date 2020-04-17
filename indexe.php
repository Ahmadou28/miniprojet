<!-- Ma Base de données Tableau -->
<?php 
$trouve=0;
$t=0;
$t1=0;
$bdd=array();
$bdd['login'] = array("admin","dany");
$bdd['pass'] = array("admin","dany");
    if (!empty($_POST)){
        $pseudo = $_POST['pseudo'];
        $mdp	= $_POST['mdp'];
        foreach($bdd['login'] as $key=> $val){
            if($val==$pseudo){
                $trouve+=1;
                $t=$key;
            break;
            }
        }
        foreach($bdd['pass'] as $key=>$val1){
            if($val1==$mdp){
                $trouve+=1;
                $t1=$key;
            break;
            }
        }
        if($trouve==2 && $t==$t1){
         header('location:pages/admin-question.php');
        }
        else{
            header('location:connexcion.php?error=1');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/connexion.css">
    <title>Le plaisir de jouer</title>
</head>
<body style="margin: 150px">
    <div class="container">
    <h1 class="plesirs"> Le plaisir de jouer </h1>
        <div class="box">          
            <form enctype="multipart/form-data" method="POST" action="pages/admin-question.php">
        <div class="croit">Login form</div>
                <div>
                    <div class="logtof"><img src="images/ic-login.png" alt="" class="logtoff"></div>
                    <input class="inputMaterial" name="pseudo" type="text" placeholder="login" required>
                </div>
                <div>
                    <div class="logtof"><img src="images/ic-password.png" alt="" class="logtoff"></div>
                    <input type="password" name="mdp" placeholder="mot de pass" required>
                </div>
                <div>
                    <button type="submit">Connexion</button>
                <p class="inscrire"><a href="pages/compt_joeur.php"> S'inscrie pour jouer</a></p>
                </div>      
            </form>
        </div>
    </div>
</body>
</html>
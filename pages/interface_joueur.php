<?php
session_start();
$avatar= $_SESSION['avatar'];
if (!isset($_SESSION['prenom'])){
    $_SESSION['msg']='Veuillez vous connecter d\'aboord';
    header('Location: player_login_page.php');
    exit;
}

$json_data= file_get_contents('../Jsonfile.json');
$decode_flux= json_decode($json_data, true);

$players=[];
$best_score=0;

foreach ($decode_flux as $value) {
    if ($value['role']== "joueur") {
        $players[] = $value;

    }
    }
$column= array_column($players,'score');
array_multisort($column, SORT_DESC, $players);

foreach ($players as $item){
    if ($_SESSION['prenom']== $item['prenom']){
        $best_score= $item['score'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/interface_joueur.css">
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
        <div class="image">

            <img  src="<?=$avatar?>" alt="">

        </div>
        <div><h2>BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br>
                JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h2>
            <a href="deconnexion.php"><button class="logout" type="submit">Déconnexion</button></a>
        </div>
        <h4><?=$_SESSION['prenom']?> <?=$_SESSION['nom']?></h4>
        
    </div>
    <div class="content">
        <div class="questions">
            <div class="questions_head">

            </div>
            <input type="text" name="nbr_point" value="3 pts" disabled>

        </div>
        <div class="scores">
            <ul>
                <a href="#" id="tp" onclick="top_score('top_players');"><li class="tp_s">Top Scores</li></a>
                <a href="#" id="best_score" onclick="top_score('best-score')"><li>Mon Meilleur Score</li></a>
            </ul>
            <div class="screen" >
                <div >
                <table >
                    <tr>
                        <th>Noms</th>
                        <th>Score</th>
                    </tr>

                      <?php
                      for ($i=0; $i <5; $i++){
                          if (array_key_exists($i,$players)){
                          echo '<td>'.$players[$i]['prenom'].' '.$players[$i]['nom'].'</td>';
                          echo '<td>'.$players[$i]['score'].'</td>';
                          echo '</tr>';
                          }
                      }
                      ?>
                </table>
                </div>

            </div>
        </div>
    </div>

    <script src="../Js/functions.js">


    </script>
</body>
</html>

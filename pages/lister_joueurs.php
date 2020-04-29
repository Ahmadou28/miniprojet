<?php
$json_data= file_get_contents('../Jsonfile.json');
$decode_flux= json_decode($json_data, true);
$tab=[];

        foreach ($decode_flux as $value){
            if ($value['role']== "joueur"){
                $tab[]= array(
                    "nom"=>$value['nom'],
                    "prenom"=>$value['prenom'],
                    "score"=>$value['score']
                );
            }
        }

// tri decroissant de la colonne score
$column= array_column($tab,'score');
array_multisort($column, SORT_DESC, $tab);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/interface_admin.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>LISTE DES JOUEURS PAR SCORE</h3>
<div class="content">
    <?php
    require_once "pagination.php";
    pagination($tab);

    ?>




</div>

</body>
</html>

<?php
function pagination ($tab){
    $num_page=0;
    $nb_articles_total = count( $tab);
    $nb_per_page = 2;
    $nb_pages = ceil($nb_articles_total / $nb_per_page);
    if (isset($_GET['page'])) {
        $num_page = $_GET['page'];
    }else{
        $num_page=1;
    }
    echo 'Nombre de pages: ' . $nb_pages . '<br>';
    echo 'Page '.$num_page.'/'.$nb_pages;

    echo '<br>';

    echo' <table >';
    echo'<tr>';
    echo' <th>Prenom</th>';
    echo '<th>Nom</th>';
    echo '<th>Score</th>';
    echo '</tr>';

    $debut = ($num_page - 1) * $nb_per_page;
    $fin = $debut + $nb_per_page - 1;
    for ($i=$debut; $i<=$fin; $i++){
        if (array_key_exists($i, $tab)) {
            echo '<tr>';
            echo '<td>' . $tab[$i]['prenom'] . '</td>';
            echo '<td>' . $tab[$i]['nom'] . '</td>';
            echo '<td>' . $tab[$i]['score'] . ' pts</td>';
            echo '</tr>';
        }

    }
    echo '</table>';
    echo '<div class="div">';
    if ($num_page > 1){
        $precedent= $num_page - 1;
        echo '<a class="pre"  href="innterface_admin.php?section=players_list&page='.$precedent.'">PREVIOUS</a>';
    }

    if ($num_page != $nb_pages){
        $suivant= $num_page + 1;
        echo '<a class="sui" href="innterface_admin.php?section=players_list&page='.$suivant.'">NEXT</a>';
    }

    echo '</div>';
}

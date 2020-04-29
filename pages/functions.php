<?php

// enregistrer les donnees du formulaire dans le json

function save_data_to_json ($login){
    $json_data= file_get_contents('../Jsonfile.json');

if ($_GET['section']== "admin"){
    $role= 'admin';
}else{
    $role='joueur';
}
    $decode_flux= json_decode($json_data, true);
$message='';
foreach ($decode_flux as $value){
    if ($login== $value['login']){
        $message='le login existe deja' ;
        break;
    }else{
        if ($_POST['pwd']!= $_POST['confirm_pwd']){
            $message='Le mot de passe doit etre identique' ;
            break;

        }else{
            $data= array(
                "prenom"=>$_POST["prenom"],
                "nom"=> $_POST["nom"],
                "login"=> $_POST["login"],
                "password"=>$_POST["pwd"],
                "avatar"=>recup_avatar(),
                "role"=>$role

            );
        }
    }
}
if (!empty($message)){
    echo '<span id="msg" style="color: red">'.$message.'</span>';
}
if (!empty($data)){
    $decode_flux[]= $data;
    $decode_flux= json_encode($decode_flux);
    file_put_contents('../Jsonfile.json', $decode_flux);
    echo '<span id="msg" style="color: green">enregistrement effectués!</span>';

}


}
// recuperer l'avatar
function recup_avatar(){
    if (isset($_FILES['file'])) {
        $name_file = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $local_image = "../Images/";
        move_uploaded_file($tmp_name, $local_image.$name_file);
        return $local_image.$name_file;
    }
}
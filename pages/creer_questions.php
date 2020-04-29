<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/interface_admin.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>PARAMETRER VOTRE QUESTION</h3>
<div class="content">
    <label for="q">Questions</label>
    <textarea name="" id="q" cols="50" rows="5"></textarea> <br> <br>
    <label for="nbr">Nbre de Points</label>
    <input type="number"name="nbr_points" id="nbr"> <br> <br>
    <label for="type">Type de réponse</label>
    <select name="response_type" id="type">
        <option value="" selected>Donnez le type de réponse</option>
        <option value="">bbb</option>
        <option value="">ccc</option>
    </select>
    <button class="plus"><img src="../Images/Icônes/ic-ajout-réponse.png" alt=""></button>
    <br><br>
    <div>
        <input class="add" type="submit" value="Enregistrer">
    </div>


</div>

</body>
</html>
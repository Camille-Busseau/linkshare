<?php
if(isset($_GET['clientId'])){
    $id = $_GET['clientId'];
    require_once "class/Crud.php";
    $Crud = new Crud;
    $client = $Crud->selectId('client', $id);
    extract($client);
}else{
    header('Location: client-index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <main>
        <p><strong>Nom utilisateur.trice :</strong><?php echo $username; ?></p>
        <p><strong>Liens favoris :</strong><?php echo $favori; ?></p>
        <p><strong>Liens partagés :</strong><?php echo $linkPartage; ?></p>
        <p><a href="client-edit.php?id=<?php echo $id; ?>">Modifier</a></p>
    </main>
</body>
</html>
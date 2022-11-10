<!-- Je ne comprend pas trop, mais la requête GET n'est jamais considéré set donc la page est jamais redirigé vers le profil -->
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
    <title>Modifier le profil</title>
    <style>
        input{
            display: block;
            margin: 5px;
        }
    </style>
</head>
<body>
<main>
    <h2>Modifier</h2>
        <form action="client-update.php" method="post">
            <input type="hidden" name="clientId" value="<?php echo $id;?>">
            <label>Nom d'utilisateur.trice 
                <input type="text" name="username" value="<?php echo $username;?>">
            </label>            
            <label>Mot de passe 
                <input type="password" name="password" value="<?php echo $password;?>">
            </label>
            <input type="submit" value="Modifier">
        </form>
        <form action="client-delete.php" method="post">
            <input type="hidden" name="clientId" value="<?php echo $id;?>">
            <input type="submit" value="Effacer">
        </form>
    </main>
    
</body>
</html>
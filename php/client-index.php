<?php
require_once "class/Crud.php";

$Crud = new Crud;

$client = $Crud->select("client", "username", "DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des profils actifs</title>
</head>
<body>
    <main>
        <h1>Profils Actifs</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom d'utilisateur.trice</th>
                    <th>Liens favoris</th>
                    <th>Liens partagés</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($client as $row){
                ?>
                    <tr>
                        <td>
                            <a href="client-show.php?id=<?php echo $row['clientId'] ?>"><?php echo $row['username'] ?></a>
                        </td>
                        <td>
                            <!-- listes des liens favoris de l'usager.ère -->
                            <a href=""></a>
                        </td>
                        <td>
                            <!-- listes des liens partagés par l'usager.ère -->
                            <a href=""></a>
                        </td>
                    </tr>
                <?php       
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
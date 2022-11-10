<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau.elle utilisateur.trice</title>
    <style>
        input{
            display: block;
            margin: 5px;
        }
    </style>
</head>
<body>
    <main>
        <h2>Saisir un nom & un mot de passe</h2>
        <form action="client-store.php" method="post">
            <label>Nom d'utilisateur.trice 
                <input type="text" name="username">
            </label>
            <label>Mot de passe
                <input type="password" name="password">
            </label>
            <input type="submit" value="Save">
        </form>
    </main>
</body>
</html>
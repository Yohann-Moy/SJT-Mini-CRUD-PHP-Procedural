<?php 
    $pageTitle = "Notre bibliothèque";
    require_once('../header.php'); 
?>

<h1>Les ouvrages de notre bibliothèque&nbsp;:</h1>

<?php

    // Récupération de la connexion à la base de données
    require_once('../dbConnect.php');

    if($pdoConn){
        // Si la connexion à la base de donnée est effective :

        // Stockage de la requête SQL au sein de la variable $query.
        $query = "SELECT * FROM books";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if($execution){

            // Si la requête s'est exécutée sans accrocs :
            // Stockage de l'ensemble des résultats de la requête dans la variable $results
            $results = $execution->fetchAll(PDO::FETCH_ASSOC);
        }
    } ?>

    <table border=1>
        <thead>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
            <?php foreach($results as $book){ ?>
                <tr>
                    <td><?= $book["name"]; ?></td>
                    <td><?= $book["description"]; ?></td>
                    <td><?= $book["price"]; ?></td>
                    <td>
                        <form method="POST" action="./update.php">
                            <input type="hidden" value="<?= $book["id"]; ?>" name="updateID">
                            <input type="submit" value="📝">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="./delete.php">
                            <input type="hidden" value="<?= $book["id"]; ?>" name="deleteID">
                            <input type="submit" value="🗑️">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p><a href="./add.php" title="Ajouter un livre à notre bibliotheque">Ajouter un livre</a></p>
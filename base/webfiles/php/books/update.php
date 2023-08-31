<?php 


// Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "deleteID".
if($_POST && isset($_POST["updateID"])){
    // Stocke l'ID du livre à supprimer dans une variable
    $bookID = $_POST["updateID"];
    
        require_once('../dbConnect.php');
        // Contrôle de l'état de la connexion à la base de données

        if($pdoConn){

            // Stockage de la requête SQL au sein de la variable $query.
            $query = "SELECT * FROM books WHERE id=$bookID";

            // Execution de la requête sur la base de données.
            // Stockage du résultat de l'exécution dans la variable $execution.
            $execution = $pdoConn->query($query);

            if($execution){
                // Si la requête qui permet de récupérer les informations du livre souhaité s'est exécutée sans accrocs :
                // On stocke les données du livre dans une variable (utilisée ultérieurement pour être affichées dans les champs).
                $book = $execution->fetch(PDO::FETCH_ASSOC);
            }
            // Si la requête a rencontré une erreur lors de son execution
            else{
                header('Location: ../error.php');
            }
        }


        // Si l'accès à la page ne s'est pas faite suite à l'envoi d'un formulaire transmis par méthode POST
        // ou bien qu'il ne contient pas un champ "updateID" renseigné.
    }
    else{
        header('Location: ../error.php');
    }
?>

<!-- Si la requête a retourné un résultat (on affiche le formulaire d'édition avec les données pré-renseignées)-->
<?php if($book){ ?>
    <?php 
        $pageTitle = "Modification d'un livre";
        require_once('../header.php'); 
    ?>

    <h1>Modification du livre intitulé <?= $book["name"]?>&nbsp;:</h1>

    <form action="./update.php" method="POST">
        <input type="text" name="titre" placeholder="Nom de votre livre" value="<?= $book["name"]?>">
        <textarea name="description" placeholder="Courte description de votre livre"><?= $book["description"]?></textarea>
        <input type="number" name="prix" placeholder="Prix du livre" value="<?= $book["price"]?>">
        <input type="hidden" value="<?= $book["id"]; ?>" name="bookID">
        <input type="submit" value="Envoyer" name="submitted">
    </form>

<?php } ?>

<?php 
    // Traitement du formulaire de modification //
    
    // Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "submitted".
    if($_POST && isset($_POST["submitted"])){

        // On devrait logiquement contrôler l'intégrité des données mais... (ce sera à vous de le faire).

        // Stockage des données issues du formulaire sous forme de variables individuelles 
        $titre = htmlentities($_POST["titre"]);
        $desc = htmlentities($_POST["description"]);
        $prix = $_POST["prix"];
        $id = $_POST["bookID"];
    
        require_once('../dbConnect.php');
        
        // Contrôle de l'état de la connexion à la base de données
        if($pdoConn){

            // Stockage de la requête d'ajout au sein de la variable $query.
            $query = "UPDATE books SET name='$titre', description='$desc', price=$prix WHERE id=$id";

            // Execution de la requête sur la base de données.
            // Stockage du résultat de l'exécution dans la variable $execution.
            $execution = $pdoConn->query($query);

            if($execution){
                // Si la requête s'est exécutée sans accrocs :
                // Redirection vers la page qui affiche l'ensemble des livres
                header('Location: ./all.php');
            }
            else{
                header('Location: ../error.php');
            }
        } // Fin du contrôle de la connexion à PDO

    } // Fin du contrôle de l'envoi du formulaire de modification (existance du champ submitted)
?>
<?php 
    // Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "deleteID".
    if($_POST && $_POST["deleteID"]){
        
        // Stocke l'ID du livre à supprimer dans une variable
        $bookID = $_POST["deleteID"];

        require_once('../dbConnect.php');

        // Contrôle de l'état de la connexion à la base de données
        if($pdoConn){

        
            // Stockage de la requête SQL au sein de la variable $query.
            $query = "DELETE FROM books WHERE id=$bookID";
            
            // Execution de la requête sur la base de données.
            // Stockage du résultat de l'exécution dans la variable $execution.
            $execution = $pdoConn->query($query);

            if($execution){
                // Si la requête de suppression s'est exécutée sans accrocs :
                // Redirection vers la page sur laquelle figurent l'ensemble des livres
                header('Location: ./all.php');
            }
            // Si la requête a rencontré une erreur lors de son execution
            else{
                header('Location: ../error.php');
            }
        } // Fin du contrôle de la connexion à PDO

        else{
            header('Location: ../error.php');
        }

        // Si l'accès à la page ne s'est pas faite suite à l'envoi d'un formulaire transmis par méthode POST
        // ou bien qu'il ne contient pas un champ "deleteID" renseigné.
    }

?>